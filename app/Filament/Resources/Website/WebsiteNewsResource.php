<?php

namespace App\Filament\Resources\Website;

use App\Filament\Resources\Website\WebsiteNewsResource\Pages;
use App\Filament\Resources\Website\WebsiteNewsResource\RelationManagers;
use App\Models\Website\WebsiteNews;
use App\Models\website\WebsiteNewsM;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WebsiteNewsResource extends Resource
{
    protected static ?string $model = WebsiteNewsM::class;
    protected static ?string $modelLabel = "Website News";

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
            'index' => Pages\ListWebsiteNews::route('/'),
            'create' => Pages\CreateWebsiteNews::route('/create'),
            'edit' => Pages\EditWebsiteNews::route('/{record}/edit'),
        ];
    }
}
