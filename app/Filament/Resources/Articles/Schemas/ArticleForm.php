<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->default('Senza nome'),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image(),
                Toggle::make('isPublished')
                    ->required(),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
            ]);
    }
}
