<?php

namespace App\Filament\Resources\Events;

use App\Filament\Resources\Events\EventsCategoryResource\Pages;
use App\Filament\Resources\Events\EventsCategoryResource\RelationManagers;
use App\Models\Events\EventsCategory;
use App\Models\events\EventsCategoryM;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventsCategoryResource extends Resource
{
    protected static ?string $model = EventsCategoryM::class;
    protected static ?string $modelLabel = "Events Category";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListEventsCategories::route('/'),
            'create' => Pages\CreateEventsCategory::route('/create'),
            'edit' => Pages\EditEventsCategory::route('/{record}/edit'),
        ];
    }
}
