<?php

namespace App\Filament\Resources;

use App\Models\Agenda;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AgendaResource extends Resource
{
    protected static ?string $model = Agenda::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Forms\Set $set, ?string $state) => $set('slug', str()->slug($state))),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique('agendas', 'slug', ignoreRecord: true),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('event_date')
                    ->required()
                    ->label('Tanggal Acara'),
                Forms\Components\TimePicker::make('event_time')
                    ->label('Waktu Acara')
                    ->seconds(false),
                Forms\Components\TextInput::make('location')
                    ->maxLength(255)
                    ->label('Lokasi'),
                Forms\Components\Select::make('status')
                    ->options([
                        'upcoming' => 'Mendatang',
                        'ongoing' => 'Sedang Berlangsung',
                        'completed' => 'Selesai',
                    ])
                    ->default('upcoming')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('event_date')
                    ->date('d M Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('event_time')
                    ->time('H:i')
                    ->label('Waktu'),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'gray' => 'upcoming',
                        'blue' => 'ongoing',
                        'green' => 'completed',
                    ]),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'upcoming' => 'Mendatang',
                        'ongoing' => 'Sedang Berlangsung',
                        'completed' => 'Selesai',
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
            'index' => \App\Filament\Resources\AgendaResource\Pages\ListAgendas::route('/'),
            'create' => \App\Filament\Resources\AgendaResource\Pages\CreateAgenda::route('/create'),
            'edit' => \App\Filament\Resources\AgendaResource\Pages\EditAgenda::route('/{record}/edit'),
        ];
    }
}
