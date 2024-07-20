<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataMobilResource\Pages;
use App\Models\DataMobil;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class DataMobilResource extends Resource
{
    protected static ?string $model = DataMobil::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('Images')->required(),
                TextInput::make('Mobil_Name')->required(),
                TextInput::make('Price')->numeric()->required(),
                TextInput::make('Luggage')->numeric()->required(),
                TextInput::make('Doors')->numeric()->required(),
                TextInput::make('Passenger')->numeric()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->searchable(),
                ImageColumn::make('Images')->label('Images'),
                TextColumn::make('Mobil_Name')
                ->label('Name')
                ->searchable(),
                TextColumn::make('Price')->label('Price'),
                TextColumn::make('Luggage')->label('Luggage'),
                TextColumn::make('Doors')->label('Doors'),
                TextColumn::make('Passenger')->label('Passenger'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDataMobils::route('/'),
            'create' => Pages\CreateDataMobil::route('/create'),
            'edit' => Pages\EditDataMobil::route('/{record}/edit'),
        ];
    }
}
