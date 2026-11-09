<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Portfolio Management';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('General Information')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $operation, ?string $state, Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->unique(Project::class, 'slug', ignoreRecord: true)
                                    ->maxLength(255),
                                Forms\Components\Select::make('category')
                                    ->options([
                                        'Web Development' => 'Web Development',
                                        'Mobile App' => 'Mobile App',
                                        'Graphic Design' => 'Graphic Design',
                                        'Photography' => 'Photography',
                                        'AI & Machine Learning' => 'AI & Machine Learning',
                                        'API / Microservices' => 'API / Microservices',
                                        'Desktop Software' => 'Desktop Software',
                                        'Open Source Project' => 'Open Source Project',
                                    ])
                                    ->searchable()
                                    ->required(),
                                Forms\Components\TextInput::make('role')
                                    ->required()
                                    ->placeholder('e.g., Lead Developer, Brand Designer, Photographer')
                                    ->maxLength(255),
                            ]),
                    ]),

                Forms\Components\Section::make('Descriptions & Tech Stack')
                    ->schema([
                        Forms\Components\Textarea::make('short_description')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull()
                            ->placeholder('Brief overview displayed in project cards and showcases...'),
                        Forms\Components\RichEditor::make('detailed_description')
                            ->columnSpanFull()
                            ->placeholder('Full case study, creative process, challenges, and results...'),
                        Forms\Components\TagsInput::make('tech_stack')
                            ->placeholder('Type a technology / tool and press enter (e.g., Laravel 13, Figma, Adobe Photoshop)')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Media & Gallery')
                    ->schema([
                        Forms\Components\FileUpload::make('thumbnail_path')
                            ->label('Project Thumbnail / Cover Image')
                            ->image()
                            ->directory('projects')
                            ->imageEditor()
                            ->maxSize(5120)
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('gallery_images')
                            ->label('Project Gallery Images (Bento Showcase for Graphic Design & Photography)')
                            ->multiple()
                            ->image()
                            ->directory('projects/gallery')
                            ->reorderable()
                            ->columnSpanFull(),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('github_url')
                                    ->label('GitHub Repository URL (Optional for Design / Photo)')
                                    ->url()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('demo_url')
                                    ->label('Live Demo / Behance / External URL')
                                    ->url()
                                    ->maxLength(255),
                            ]),
                    ]),

                Forms\Components\Section::make('Publication & Display')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Toggle::make('is_featured')
                                    ->label('Featured Project (Pin to home spotlight)')
                                    ->default(false),
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
                Tables\Columns\ImageColumn::make('thumbnail_path')
                    ->label('Thumbnail')
                    ->rounded(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->searchable()
                    ->sortable()
                    ->color(fn (string $state): string => match ($state) {
                        'Web Development' => 'primary',
                        'Mobile App' => 'info',
                        'Graphic Design' => 'warning',
                        'Photography' => 'success',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('role')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean()
                    ->sortable(),
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
                        'Web Development' => 'Web Development',
                        'Mobile App' => 'Mobile App',
                        'Graphic Design' => 'Graphic Design',
                        'Photography' => 'Photography',
                        'AI & Machine Learning' => 'AI & Machine Learning',
                        'API / Microservices' => 'API / Microservices',
                        'Desktop Software' => 'Desktop Software',
                        'Open Source Project' => 'Open Source Project',
                    ]),
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured Projects'),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
