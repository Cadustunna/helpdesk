<?php

namespace App\Filament\Resources\Tickets;

use App\Filament\Resources\Tickets\RelationManagers\MessagesRelationManager;
use App\Filament\Resources\Tickets\Pages\CreateTicket;
use App\Filament\Resources\Tickets\Pages\EditTicket;
use App\Filament\Resources\Tickets\Pages\ListTickets;
use App\Filament\Resources\Tickets\Schemas\TicketForm;
use App\Filament\Resources\Tickets\Tables\TicketsTable;
use App\Models\Ticket;
use BackedEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Livewire\Form;

class TicketResource extends Resource
{
    protected static ?string $model = Ticket::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Admin';

    public static function form(Schema $form): Schema
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('Submitted By')
                    ->required(),

                Select::make('category')
                    ->options([
                        'Technical' => 'Technical',
                        'Billing' => 'Billing',
                        'Account' => 'Account',
                    ])
                    ->required(),

                Select::make('priority')
                    ->options([
                        'Low' => 'Low',
                        'Medium' => 'Medium',
                        'High' => 'High',
                    ])
                    ->required(),

                Select::make('status')
                    ->options([
                        'Open' => 'Open',
                        'In Progress' => 'In Progress',
                        'Closed' => 'Closed',
                    ])
                    ->default('Open')
                    ->required()
                    ->visible(fn () => Auth::user() ?->is_admin)
                    ->required()
                    ->disabled(fn (Ticket $record) =>
                        ! Auth::user()->is_admin &&
                        $record->status === 'In Progress'
                    ),
            ]);

        return TicketForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('user.name')->label('Submitted By'),
                TextColumn::make('category'),
                TextColumn::make('priority'),
                BadgeColumn::make('status')
                    ->colors([
                        'success' => 'Open',
                        'warning' => 'In Progress',
                        'danger' => 'Closed',
                    ]),
                TextColumn::make('created_at')->dateTime('M d, Y H:i'),
            ])
            ->filters([
                // optional: filter by status or priority
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\DeleteBulkAction::make(),
            ]);

        return TicketsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
           MessagesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTickets::route('/'),
            'create' => CreateTicket::route('/create'),
            'edit' => EditTicket::route('/{record}/edit'),
        ];
    }
}
