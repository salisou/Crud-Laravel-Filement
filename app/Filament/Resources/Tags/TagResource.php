<?php

namespace App\Filament\Resources\Tags;

use App\Filament\Resources\Tags\Pages\CreateTag;
use App\Filament\Resources\Tags\Pages\EditTag;
use App\Filament\Resources\Tags\Pages\ListTags;
use App\Filament\Resources\Tags\Pages\ViewTag;
use App\Filament\Resources\Tags\Schemas\TagForm;
use App\Filament\Resources\Tags\Schemas\TagInfolist;
use App\Filament\Resources\Tags\Tables\TagsTable;
use App\Models\Tag;
use BackedEnum;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class TagResource extends Resource
{
    protected static ?string $model = Tag::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'no';

    public static function configure(Table $table): Table // form(Schema $schema): Schema
    {
        // return TagForm::configure($schema);
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Creato il')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        // return TagInfolist::configure($schema);
        return $schema->schema([
            TextInput::make('name')
                ->label('Nome')
                ->required()
                ->reactive()
                ->afterStateUpdated(
                    fn($state, callable $set) =>
                    $set('slug', Str::slug($state))
                ),

            TextInput::make('slug')
                ->required()
                ->unique(ignoreRecord: true)
        ]);
    }

    public static function table(Table $table): Table
    {
        // return TagsTable::configure($table);
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Creato il')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
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
            'index' => ListTags::route('/'),
            'create' => CreateTag::route('/create'),
            'view' => ViewTag::route('/{record}'),
            'edit' => EditTag::route('/{record}/edit'),
        ];
    }
}
