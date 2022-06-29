<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatchnotesResource\Pages;
use App\Filament\Resources\PatchnotesResource\RelationManagers;
use App\Models\Patchnotes;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\TemporaryUploadedFile;

class PatchnotesResource extends Resource
{
    protected static ?string $model = Patchnotes::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('post_title'),
                Forms\Components\TextInput::make('post_body'),
                FileUpload::make('post_image')
                    ->image()
                    ->label('Kapak Resmi')
                    ->imageResizeTargetWidth('270')
                    ->imageResizeTargetHeight('200')
                    ->imagePreviewHeight('430')
                    ->directory('img')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string)str($file->getClientOriginalName())->prepend('oyun-');
                    }),
                Forms\Components\TextInput::make('games_id'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('post_title'),
                Tables\Columns\TextColumn::make('games_id'),
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
            'index' => Pages\ListPatchnotes::route('/'),
            'create' => Pages\CreatePatchnotes::route('/create'),
            'edit' => Pages\EditPatchnotes::route('/{record}/edit'),
        ];
    }
}
