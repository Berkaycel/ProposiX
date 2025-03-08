<?php

namespace App\Library\Enums;

enum UserType: string
{
    case ADMIN = 'ADMIN';
    case CUSTOMER = 'CUSTOMER';
    case COMPANY = 'COMPANY';

    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'Admin',
            self::CUSTOMER => 'Customer',
            self::COMPANY => 'Company',
        };
    }
}
