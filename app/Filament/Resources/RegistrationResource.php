<?php

namespace App\Filament\Resources;

use App\Models\Registration;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RegistrationResource extends Resource
{
    protected static ?string $model = Registration::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';

    protected static ?string $navigationLabel = 'PPDB Registrations';

    protected static ?string $modelLabel = 'Registration';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Student Information')
                    ->schema([
                        Forms\Components\TextInput::make('student_name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required(),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->required(),
                        Forms\Components\DatePicker::make('birth_date'),
                        Forms\Components\TextInput::make('current_school')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('address')
                            ->columnSpanFull(),
                    ])->columns(2),
                Forms\Components\Section::make('Guardian Information')
                    ->schema([
                        Forms\Components\TextInput::make('guardian_name')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('guardian_phone')
                            ->tel(),
                    ])->columns(2),
                Forms\Components\Section::make('Application Status')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'approved' => 'Approved',
                                'rejected' => 'Rejected',
                            ])
                            ->default('pending'),
                        Forms\Components\Textarea::make('notes')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birth_date')
                    ->date(),
                Tables\Columns\BadgeColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\RegistrationResource\Pages\ListRegistrations::route('/'),
            'view' => \App\Filament\Resources\RegistrationResource\Pages\ViewRegistration::route('/{record}/view'),
        ];
    }
}
