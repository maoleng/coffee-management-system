<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Attributes\Description;
use BenSampo\Enum\Enum;

final class AdminRole extends BaseEnum
{
    #[Description('Admin')]
    public const ADMIN = 0;

    #[Description('Product & warehouse employee')]
    public const PRODUCT_WAREHOUSE = 1;

    #[Description('Customer care employee')]
    public const CUSTOMER_CARE = 2;

    #[Description('Marketing employee')]
    public const MARKETING = 3;

    #[Description('Sale employee')]
    public const SALE = 4;

}
