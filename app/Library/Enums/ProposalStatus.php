<?php
namespace App\Library\Enums;

enum ProposalStatus: string
{
    case PENDING = 'PENDING';
    case ACTIVE = 'ACTIVE';
    case OWNER_CANCELLED = 'OWNER_CANCELLED';
    case CUSTOMER_CANCELLED = 'CUSTOMER_CANCELLED';
    case MODIFIED = 'MODIFIED';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Beklemede',
            self::ACTIVE => 'Aktif',
            self::OWNER_CANCELLED => 'Satıcı İptali',
            self::CUSTOMER_CANCELLED => 'Müşteri İptali',
            self::MODIFIED => 'Düzenlendi'
        };
    }
}