<?php

namespace App\Filament\Resources\Website;

use App\Filament\Resources\Website\WebsiteFaqsResource\Pages;
use App\Filament\Resources\Website\WebsiteFaqsResource\RelationManagers;
use App\Models\Website\WebsiteFaqs;
use App\Models\website\WebsiteFaqsM;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WebsiteFaqsResource extends Resource
{
    protected static ?string $model = WebsiteFaqsM::class;
    protected static ?string $modelLabel = "Website Faqs";

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
            'index' => Pages\ListWebsiteFaqs::route('/'),
            'create' => Pages\CreateWebsiteFaqs::route('/create'),
            'edit' => Pages\EditWebsiteFaqs::route('/{record}/edit'),
        ];
    }
}
