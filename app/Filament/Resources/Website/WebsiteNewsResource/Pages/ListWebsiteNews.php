<?php

namespace App\Filament\Resources\Website\WebsiteNewsResource\Pages;

use App\Filament\Resources\Website\WebsiteNewsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ListWebsiteNews extends ListRecords
{
    protected static string $resource = WebsiteNewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code'),
                TextColumn::make('title.ar'),
                TextColumn::make('title.en'),
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
