<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Item;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\Category;
use Doctrine\DBAL\Query;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Illuminate\Support\Collection;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ItemResource\Pages;
use NunoMaduro\Collision\Adapters\Phpunit\State;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ItemResource\RelationManagers;
use App\Filament\Resources\ItemResource\RelationManagers\ContainerRelationManager;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;
    protected static ?string $modelLabel = "Items";
    protected static ?string $navigationTitle = "MYstore";
    protected static ?string $navigationIcon = 'heroicon-o-chart-pie';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->columnSpanFull(),
                Select::make('container_id')
                    ->relationship(name:'container',titleAttribute:'name')
                    ->searchable()
                    ->live()
                    // ->afterStateUpdated(function (Set $set) {
                    //     $set('category_id',null);
                    // })
                    ->preload(),
                    Select::make('category_id')
                    ->relationship(name:'category',titleAttribute:'name')
                    ->searchable()
                    ->live()
                    // ->afterStateUpdated(function (Set $set) {
                    //     $set('category_id',null);
                    // })
                    ->preload(),
                // Select::make('category_id')
                //     ->options(fn(Get $get): Collection=>Category::query()
                //         ->where('container_id',$get('container_id'))
                //         ->pluck('name','id'))
                //     ->searchable()
                //     ->live()
                //     ->preload(),
                // Select::make('container_id')
                // ->relationship(name:'container',titleAttribute:'name')
                // ->label('Container'),
                // Select::make('category_id')
                // ->relationship(name:'category',titleAttribute:'name')
                // ->label('Category'),
                TextInput::make('description'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->searchable(),
                TextColumn::make('user.name')
                ->searchable(),
                TextColumn::make('container.name')
                ->searchable(),
                TextColumn::make('category.name')
                ->searchable(),
                TextColumn::make('description')
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            ContainerRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListItems::route('/'),
            'create' => Pages\CreateItem::route('/create'),
            'edit' => Pages\EditItem::route('/{record}/edit'),
        ];
    }
}
