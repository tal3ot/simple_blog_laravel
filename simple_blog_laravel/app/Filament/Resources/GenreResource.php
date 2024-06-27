<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GenreResource\Pages;
use App\Filament\Resources\GenreResource\RelationManagers;
use App\Models\Genre;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class GenreResource extends Resource
{
    protected static ?string $model = Genre::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                ->live() //it's updating the model as we type in
                ->required()->minLength(1)->maxLength(150)
                ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) { //afterStateUpdated is like a hook it wil call the function whenever the value of tilte change, the function take a string argument of the operation you do (create or edit) if you're creating or editing the genre in the admin page then it take the second argument $state which is the current value of the title or the property on the liver component that the filament is using   
                    if ($operation === 'edit') { //changing the slug based on the title value only if the operation is creating
                        return;
                    }
                    $set('slug', Str::slug($state)); //changing the slug based on the value of the title
                }),
                TextInput::make('slug')->required()->minLength(1)->unique(ignoreRecord: true)->maxLength(150),//ignoreRecord is in order to ensure it'll work in updated pages
                TextInput::make('text_color')->nullable(),
                TextInput::make('bg_color')->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('slug')->sortable()->searchable(),
                TextColumn::make('text_color')->sortable()->searchable(),
                TextColumn::make('bg_color')->sortable()->searchable(),
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
            'index' => Pages\ListGenres::route('/'),
            'create' => Pages\CreateGenre::route('/create'),
            'edit' => Pages\EditGenre::route('/{record}/edit'),
        ];
    }
}
