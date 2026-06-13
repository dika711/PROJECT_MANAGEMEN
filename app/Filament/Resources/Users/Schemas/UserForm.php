<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\TextInput::make('name')
                ->label('Nama Lengkap')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('nickname')
                ->label('Nickname')
                ->maxLength(100),

            Forms\Components\TextInput::make('phone')
                ->label('Nomor HP')
                ->tel()
                ->maxLength(20),

            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
                ->unique(ignoreRecord: true)
                ->required(),

            Forms\Components\Select::make('role')
                ->label('Role')
                ->options([
                    'admin' => 'Admin',
                    'user' => 'User',
                ])
                ->required(),

            Forms\Components\TextInput::make('password')
                ->label('Password')
                ->password()
                ->required(fn ($context) => $context === 'create')
                ->dehydrateStateUsing(fn ($state) => filled($state) ? bcrypt($state) : null)
                ->dehydrated(fn ($state) => filled($state)),
        ]);
    }
}
