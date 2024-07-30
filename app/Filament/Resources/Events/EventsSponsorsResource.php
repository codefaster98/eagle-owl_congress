<?php

namespace App\Filament\Resources\Events;

use App\Filament\Resources\Events\EventsSponsorsResource\Pages;
use App\Filament\Resources\Events\EventsSponsorsResource\RelationManagers;
use App\Models\Events\EventsSponsors;
use App\Models\events\EventsSponsorsM;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventsSponsorsResource extends Resource
{
    protected static ?string $model = EventsSponsorsM::class;
    protected static ?string $modelLabel = "Events Sponsor";

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
            'index' => Pages\ListEventsSponsors::route('/'),
            'create' => Pages\CreateEventsSponsors::route('/create'),
            'edit' => Pages\EditEventsSponsors::route('/{record}/edit'),
        ];
    }
}
