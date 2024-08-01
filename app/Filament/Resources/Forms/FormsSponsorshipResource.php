<?php

namespace App\Filament\Resources\Forms;

use App\Filament\Resources\Forms\FormsSponsorshipResource\Pages;
use App\Filament\Resources\Forms\FormsSponsorshipResource\RelationManagers;
use App\Models\forms\FormSponsorshipM;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FormsSponsorshipResource extends Resource
{
    protected static ?string $model = FormSponsorshipM::class;
    protected static ?string $modelLabel = "Form Sponsorship";

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
            'index' => Pages\ListFormsSponsorships::route('/'),
            // 'create' => Pages\CreateFormsSponsorship::route('/create'),
            // 'edit' => Pages\EditFormsSponsorship::route('/{record}/edit'),
        ];
    }
}
