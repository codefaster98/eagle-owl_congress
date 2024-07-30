<?php

namespace App\Filament\Resources\Events;

use App\Filament\Resources\Events\EventsSpeakersResource\Pages;
use App\Filament\Resources\Events\EventsSpeakersResource\RelationManagers;
use App\Models\Events\EventsSpeakers;
use App\Models\events\EventsSpeakersM;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventsSpeakersResource extends Resource
{
    protected static ?string $model = EventsSpeakersM::class;
    protected static ?string $modelLabel = "Events Speakers";

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
            'index' => Pages\ListEventsSpeakers::route('/'),
            'create' => Pages\CreateEventsSpeakers::route('/create'),
            'edit' => Pages\EditEventsSpeakers::route('/{record}/edit'),
        ];
    }
}
