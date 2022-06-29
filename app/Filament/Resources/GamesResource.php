<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GamesResource\Pages;
use App\Filament\Resources\GamesResource\RelationManagers;
use App\Models\Games;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\TemporaryUploadedFile;

class GamesResource extends Resource
{
    protected static ?string $model = Games::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('game_name'),
                Forms\Components\TextInput::make('game_platform'),
                FileUpload::make('game_image')
                    ->image()
                    ->label('Kapak Resmi')
                    ->imageResizeTargetWidth('400')
                    ->imageResizeTargetHeight('430')
                    ->imagePreviewHeight('430')
                    ->directory('img')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string)str($file->getClientOriginalName())->prepend('oyun-');
                    }),
                Forms\Components\TextInput::make('release_date'),
                Forms\Components\TextInput::make('genre'),
                Forms\Components\TextInput::make('developer'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('game_name'),
                Tables\Columns\TextColumn::make('game_platform'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListGames::route('/'),
            'create' => Pages\CreateGames::route('/create'),
            'edit' => Pages\EditGames::route('/{record}/edit'),
        ];
    }
}
