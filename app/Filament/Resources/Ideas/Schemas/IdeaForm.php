<?php

namespace App\Filament\Resources\Ideas\Schemas;

use App\Enums\Priority;
use App\Enums\Status;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class IdeaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Select::make('status')
                    ->options(Status::class)
                    ->required(),
                Select::make('priority')
                    ->options(Priority::class)
                    ->required(),
                TextInput::make('category')
                    ->required(),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
            ]);
    }
}
