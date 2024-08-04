<?php

namespace App\Filament\Resources\Events\EventsEventsResource\Pages;

use App\Filament\Resources\Events\EventsEventsResource;
use App\Models\events\EventsSponsorsM;
use Filament\Actions;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Repeater;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;

class ViewEventsEvents extends ViewRecord
{
    protected static string $resource = EventsEventsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\EditAction::make(),
        ];
    }
    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('code')->label("code"),
                TextEntry::make('price')->label("price")->numeric(),
                TextEntry::make('category.name')->badge()->separator(',')->label("Category Name"),
                TextEntry::make('date')->dateTime('Y-m-d')->label("Date"),
                TextEntry::make('from_time')->dateTime('H:i')->label("From Time"),
                TextEntry::make('to_time')->dateTime('H:i')->label("To Time"),
                TextEntry::make('name.ar')->label("Arabic Name"),
                TextEntry::make('name.en')->label("English Name"),
                TextEntry::make('short_details.ar')->label("Arabic short details")->markdown(),
                TextEntry::make('short_details.en')->label("English short details")->markdown(),
                TextEntry::make('long_details.ar')->label("Arabic Long details")->markdown(),
                TextEntry::make('long_details.en')->label("English Long details")->markdown(),
                TextEntry::make('speakers.*.name')->listWithLineBreaks()->bulleted()->label("speakers"),
                TextEntry::make('sponsors.name')->listWithLineBreaks()->bulleted()->label("sponsors"),
                // Repeater::make('sponsors')
                //     ->relationship('Sponsors', fn (Builder $query) => $query->whereNotNull('iod'))
                //     ->schema([
                //         TextEntry::make('name'),
                //         // Toggle::make('visible'),
                //         // Toggle::make('status'),
                //         ])->columns(3),
                RepeatableEntry::make('sponsors')
                    // ->getRelationshipResults(EventsSponsorsM::class,[])
                    ->schema([
                        TextEntry::make('name')->label("sss")
                    ])
            ]);
    }
}
