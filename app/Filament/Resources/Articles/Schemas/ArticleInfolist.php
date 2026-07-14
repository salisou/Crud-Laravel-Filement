<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ArticleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')->label('Nome'),
                TextEntry::make('slug'),
                TextEntry::make('description')
                    ->label('Descrizione')
                    ->columnSpanFull(),
                ImageEntry::make('image')
                    ->label('Immagine')
                    ->placeholder('-'),
                TextEntry::make('category.name')
                    ->label('Category'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),

                TextEntry::make('tags.name')
                    ->label('Tags')
                    ->badge()
                    ->separator(', '),

                IconEntry::make('isPublished')
                    ->label('Pubblicato')
                    ->boolean(),

                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
