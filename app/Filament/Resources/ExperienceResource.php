<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExperienceResource\Pages;
use App\Models\Experience;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ExperienceResource extends Resource
{
    protected static ?string $model = Experience::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'Portfolio Management';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Experience Information')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('Title / Role / Degree')
                                    ->required()
                                    ->placeholder('e.g., Informatics Engineering Student, Backend Developer Intern')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('institution')
                                    ->label('Institution / Company / Campus')
                                    ->required()
                                    ->placeholder('e.g., State Polytechnic of Malang (Polinema)')
                                    ->maxLength(255),
                                Forms\Components\Select::make('type')
                                    ->label('Category Type')
                                    ->options([
                                        'Education' => 'Education',
                                        'Work Experience' => 'Work Experience',
                                        'Organizational Experience' => 'Organizational Experience',
                                        'Volunteering' => 'Volunteering',
                                    ])
                                    ->searchable()
                                    ->required(),
                                Forms\Components\Select::make('phase')
                                    ->label('Phase / Level')
                                    ->options([
                                        'Polinema' => 'Polinema (College)',
                                        'SMK' => 'SMK (Vocational High School)',
                                        'SMP' => 'SMP (Junior High School)',
                                        'Internship' => 'Internship',
                                        'Full-time' => 'Full-time',
                                        'Freelance' => 'Freelance',
                                    ])
                                    ->searchable()
                                    ->required(),
                            ]),
                    ]),

                Forms\Components\Section::make('Timeline & Details')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\DatePicker::make('start_date')
                                    ->required(),
                                Forms\Components\DatePicker::make('end_date')
                                    ->placeholder('Leave empty if currently active / ongoing'),
                            ]),
                        Forms\Components\Textarea::make('description')
                            ->rows(4)
                            ->columnSpanFull()
                            ->placeholder('Describe responsibilities, achievements, and impact...'),
                        Forms\Components\TagsInput::make('skills_gained')
                            ->label('Skills & Competencies Gained')
                            ->placeholder('Type a skill and press enter (e.g., Laravel, System Architecture, Leadership)')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('order_column')
                            ->label('Display Order')
                            ->numeric()
                            ->default(0)
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Role / Title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('institution')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->searchable()
                    ->sortable()
                    ->color(fn (string $state): string => match ($state) {
                        'Education' => 'success',
                        'Work Experience' => 'primary',
                        'Organizational Experience' => 'warning',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('phase')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->date('M Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date('M Y')
                    ->placeholder('Present')
                    ->sortable(),
                Tables\Columns\TextColumn::make('order_column')
                    ->label('Order')
                    ->sortable(),
            ])
            ->defaultSort('order_column', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'Education' => 'Education',
                        'Work Experience' => 'Work Experience',
                        'Organizational Experience' => 'Organizational Experience',
                        'Volunteering' => 'Volunteering',
                    ]),
                Tables\Filters\SelectFilter::make('phase')
                    ->options([
                        'Polinema' => 'Polinema',
                        'SMK' => 'SMK',
                        'SMP' => 'SMP',
                        'Internship' => 'Internship',
                        'Full-time' => 'Full-time',
                        'Freelance' => 'Freelance',
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
            'index' => Pages\ListExperiences::route('/'),
            'create' => Pages\CreateExperience::route('/create'),
            'edit' => Pages\EditExperience::route('/{record}/edit'),
        ];
    }
}
