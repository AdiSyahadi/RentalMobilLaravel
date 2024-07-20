<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataSewaResource\Pages;
use App\Filament\Resources\DataSewaResource\RelationManagers;
use App\Models\DataSewa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataSewaResource extends Resource
{
    protected static ?string $model = DataSewa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('car_id')->required(),
                TextInput::make('car_name')->required(),
                TextInput::make('name')->required(),
                TextInput::make('email')->required(),
                TextInput::make('whatsapp')->required(),
                TextInput::make('address')->required(),
                DatePicker::make('start_date')
                    ->required()
                    ->label('Start Date'),
                DatePicker::make('end_date')
                    ->required()
                    ->label('End Date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->searchable(),
                TextColumn::make('car_name')
                    ->label('Name')
                    ->searchable(),
                TextColumn::make('name')->label('Name'),
                TextColumn::make('email')->label('Email'),
                TextColumn::make('whatsapp')->label('WhatsApp'),
                TextColumn::make('address')->label('Address'),
                TextColumn::make('start_date')->label('Start Date'),
                TextColumn::make('end_date')->label('End Date'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListDataSewas::route('/'),
            'create' => Pages\CreateDataSewa::route('/create'),
            'edit' => Pages\EditDataSewa::route('/{record}/edit'),
        ];
    }
}
