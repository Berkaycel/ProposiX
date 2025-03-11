<?php
namespace App\Library\Enums;

enum ProductStatus: string
{
    case ON_SALE = 'ON_SALE';
    case NOT_FOR_SALE = 'NOT_FOR_SALE';
    case PENDING = 'PENDING';

    public function label(): string
    {
        return match ($this) {
            self::ON_SALE => 'Satışta',
            self::NOT_FOR_SALE => 'Satışta Değil',
            self::PENDING => 'Beklemede',
        };
    }
}
