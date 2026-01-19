<?php

namespace App\Filament\Resources\Tickets\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TicketForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('title')
                    ->default(null),
                TextInput::make('message')
                    ->default(null),
                Select::make('category')
                    ->options(['Technical' => 'Technical', 'Billing' => 'Billing', 'Account' => 'Account'])
                    ->default('Technical')
                    ->required(),
                Select::make('priority')
                    ->options(['Low' => 'Low', 'Medium' => 'Medium', 'High' => 'High'])
                    ->default('Low')
                    ->required(),
                Select::make('status')
                    ->options(['Open' => 'Open', 'In Progress' => 'In progress', 'Closed' => 'Closed'])
                    ->default('Open')
                    ->required(),
            ]);
    }
}
