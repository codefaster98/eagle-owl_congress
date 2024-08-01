<?php

namespace App\Filament\Resources\Forms\FormsSponsorshipResource\Pages;

use App\Filament\Resources\Forms\FormsSponsorshipResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ListFormsSponsorships extends ListRecords
{
    protected static string $resource = FormsSponsorshipResource::class;

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
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('phone_code'),
                TextColumn::make('phone'),
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
