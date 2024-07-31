<?php

namespace App\Filament\Resources\Events\EventsEventsResource\Pages;

use App\Filament\Resources\Events\EventsEventsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ListEventsEvents extends ListRecords
{
    protected static string $resource = EventsEventsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    /*
      'code',
        'category_id',
        'name',
        'short_details',
        'long_details',
        'date',
        '',
        '',
    */
    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code'),
                TextColumn::make('name.ar'),
                TextColumn::make('name.en'),
                TextColumn::make('date')->dateTime("Y-m-d"),
                TextColumn::make('from_time')->dateTime("H:i"),
                TextColumn::make('to_time')->dateTime("H:i"),
            ])
            ->filters([
                // Filter::make('verified')
                //     ->query(fn (Builder $query): Builder => $query->whereNotNull('email_verified_at')),
                // ...
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
