<?php

namespace App\Filament\Resources\Tickets\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class MessagesRelationManager extends RelationManager
{
    protected static string $relationship = 'messages';

    public function form(Schema $schema): Schema
    {
        return $schema->schema([
            Textarea::make('message')
                ->required()
                ->maxLength(2000),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Sender'),

                Tables\Columns\TextColumn::make('message')
                    ->wrap(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->headerActions([
                Action::make('reply')
                    ->label('Reply')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->form([
                        Textarea::make('message')
                            ->required()
                            ->maxLength(2000),
                    ])
                    ->action(function (array $data): void {
                        $this->getOwnerRecord()
                            ->messages()
                            ->create([
                                'user_id' => Auth::id(),
                                'message' => $data['message'],
                            ]);
                    })
                    ->visible(fn () => Auth::user()?->is_admin === true),
            ]);
    }
}
