<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\UsersUsersResource\Pages;
use App\Filament\Resources\Users\UsersUsersResource\RelationManagers;
use App\Models\Users\UsersUsers;
use App\Models\Users\UsersUsersM;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UsersUsersResource extends Resource
{
    protected static ?string $model = UsersUsersM::class;
    protected static ?string $modelLabel = "Users";

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
            'index' => Pages\ListUsersUsers::route('/'),
            'create' => Pages\CreateUsersUsers::route('/create'),
            'edit' => Pages\EditUsersUsers::route('/{record}/edit'),
        ];
    }
}
