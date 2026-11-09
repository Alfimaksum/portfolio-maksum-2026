<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificateResource\Pages;
use App\Models\Certificate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CertificateResource extends Resource
{
    protected static ?string $model = Certificate::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-check';

    protected static ?string $navigationGroup = 'Portfolio Management';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Certificate Information')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('e.g., AWS Certified Solutions Architect, Laravel Certified'),
                                Forms\Components\TextInput::make('issuer')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('e.g., Amazon Web Services, Dicoding Indonesia, Coursera'),
                                Forms\Components\DatePicker::make('issue_date')
                                    ->label('Issue Date'),
                                Forms\Components\TextInput::make('credential_url')
                                    ->label('Credential Verification URL')
                                    ->url()
                                    ->maxLength(255),
                            ]),
                    ]),

                Forms\Components\Section::make('Certificate File')
                    ->schema([
                        Forms\Components\FileUpload::make('image_path')
                            ->label('Certificate Image / Scan')
                            ->image()
                            ->directory('certificates')
                            ->imageEditor()
                            ->maxSize(5120)
                            ->required()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Certificate')
                    ->rounded(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('issuer')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('issue_date')
                    ->date('M Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('credential_url')
                    ->label('Credential')
                    ->limit(30)
                    ->url(fn ($record) => $record->credential_url, shouldOpenInNewTab: true)
                    ->color('primary'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
            'index' => Pages\ListCertificates::route('/'),
            'create' => Pages\CreateCertificate::route('/create'),
            'edit' => Pages\EditCertificate::route('/{record}/edit'),
        ];
    }
}
