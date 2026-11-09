<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkillResource\Pages;
use App\Models\Skill;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SkillResource extends Resource
{
    protected static ?string $model = Skill::class;

    protected static ?string $navigationIcon = 'heroicon-o-bolt';

    protected static ?string $navigationGroup = 'Portfolio Management';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Skill Information')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('e.g., Laravel, PostgreSQL, Docker'),
                                Forms\Components\Select::make('category')
                                    ->options([
                                        'Backend Development' => 'Backend Development',
                                        'Frontend Development' => 'Frontend Development',
                                        'Database & Caching' => 'Database & Caching',
                                        'DevOps & Cloud' => 'DevOps & Cloud',
                                        'Mobile Development' => 'Mobile Development',
                                        'AI & Machine Learning' => 'AI & Machine Learning',
                                        'Tools & Methods' => 'Tools & Methods',
                                    ])
                                    ->searchable()
                                    ->required(),
                                Forms\Components\FileUpload::make('icon_path')
                                    ->label('Skill Icon / Logo')
                                    ->image()
                                    ->directory('skills')
                                    ->maxSize(2048),
                                Forms\Components\TextInput::make('order_column')
                                    ->label('Display Order')
                                    ->numeric()
                                    ->default(0)
                                    ->required(),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('icon_path')
                    ->label('Icon')
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->searchable()
                    ->sortable()
                    ->color(fn (string $state): string => match ($state) {
                        'Backend Development' => 'primary',
                        'Frontend Development' => 'info',
                        'Database & Caching' => 'success',
                        'DevOps & Cloud' => 'warning',
                        'AI & Machine Learning' => 'danger',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('order_column')
                    ->label('Order')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('order_column', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'Backend Development' => 'Backend Development',
                        'Frontend Development' => 'Frontend Development',
                        'Database & Caching' => 'Database & Caching',
                        'DevOps & Cloud' => 'DevOps & Cloud',
                        'Mobile Development' => 'Mobile Development',
                        'AI & Machine Learning' => 'AI & Machine Learning',
                        'Tools & Methods' => 'Tools & Methods',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListSkills::route('/'),
            'create' => Pages\CreateSkill::route('/create'),
            'edit' => Pages\EditSkill::route('/{record}/edit'),
        ];
    }
}
