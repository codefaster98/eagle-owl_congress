<?php

namespace App\Filament\Resources\Events;

use App\Filament\Resources\Events\EventsEventsResource\Pages;
use App\Filament\Resources\Events\EventsEventsResource\RelationManagers;
use App\Models\Events\EventsEvents;
use App\Models\events\EventsEventsM;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventsEventsResource extends Resource
{
    protected static ?string $model = EventsEventsM::class;
    protected static ?string $modelLabel = "Events Events";

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
            'index' => Pages\ListEventsEvents::route('/'),
            'create' => Pages\CreateEventsEvents::route('/create'),
            'edit' => Pages\EditEventsEvents::route('/{record}/edit'),
        ];
    }
}
