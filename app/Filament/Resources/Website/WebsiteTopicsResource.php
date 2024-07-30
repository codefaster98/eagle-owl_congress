<?php

namespace App\Filament\Resources\Website;

use App\Filament\Resources\Website\WebsiteTopicsResource\Pages;
use App\Filament\Resources\Website\WebsiteTopicsResource\RelationManagers;
use App\Models\Website\WebsiteTopics;
use App\Models\website\WebsiteTopicsM;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WebsiteTopicsResource extends Resource
{
    protected static ?string $model = WebsiteTopicsM::class;
    protected static ?string $modelLabel = "Website Topics";

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
            'index' => Pages\ListWebsiteTopics::route('/'),
            'create' => Pages\CreateWebsiteTopics::route('/create'),
            'edit' => Pages\EditWebsiteTopics::route('/{record}/edit'),
        ];
    }
}
