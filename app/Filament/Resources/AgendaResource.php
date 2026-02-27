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

    protected static ?string $navigationLabel = 'Agenda';

    protected static ?string $label = 'Agenda';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Agenda')
                    ->description('Masukkan informasi lengkap tentang agenda')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->label('Judul Agenda')
                            ->placeholder('Contoh: Rapat Guru Bulanan')
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Forms\Set $set, ?string $state) => $set('slug', str()->slug($state))),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->label('Slug')
                            ->disabled()
                            ->unique(Agenda::class, 'slug', ignoreRecord: true),

                        Forms\Components\Textarea::make('description')
                            ->columnSpanFull()
                            ->label('Deskripsi')
                            ->placeholder('Jelaskan detail agenda...')
                            ->rows(4),
                    ]),

                Forms\Components\Section::make('Waktu & Tempat')
                    ->schema([
                        Forms\Components\DatePicker::make('event_date')
                            ->required()
                            ->label('Tanggal')
                            ->native(false)
                            ->displayFormat('d F Y'),

                        Forms\Components\TextInput::make('event_time')
                            ->label('Waktu')
                            ->placeholder('14:30')
                            ->maxLength(5)
                            ->hint('Format: JJ:MM'),

                        Forms\Components\TextInput::make('location')
                            ->label('Tempat/Lokasi')
                            ->placeholder('Contoh: Ruang Rapat A')
                            ->maxLength(255),
                    ])->columns(3),

                Forms\Components\Section::make('Status')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'upcoming' => 'Akan Datang',
                                'ongoing' => 'Sedang Berlangsung',
                                'completed' => 'Selesai',
                            ])
                            ->default('upcoming')
                            ->required()
                            ->native(false),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->label('Judul')
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('event_date')
                    ->date('d F Y')
                    ->sortable()
                    ->label('Tanggal'),

                Tables\Columns\TextColumn::make('event_time')
                    ->formatStateUsing(fn (?string $state): ?string => $state ? substr($state, 0, 5) : null)
                    ->label('Waktu'),

                Tables\Columns\TextColumn::make('location')
                    ->searchable()
                    ->label('Tempat')
                    ->limit(25)
                    ->placeholder('-'),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'upcoming' => 'info',
                        'ongoing' => 'warning',
                        'completed' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'upcoming' => 'Akan Datang',
                        'ongoing' => 'Sedang Berlangsung',
                        'completed' => 'Selesai',
                        default => $state,
                    })
                    ->label('Status'),
            ])
            ->defaultSort('event_date', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Filter Status')
                    ->options([
                        'upcoming' => 'Akan Datang',
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
            ])
            ->striped()
            ->paginated([10, 25, 50]);
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
