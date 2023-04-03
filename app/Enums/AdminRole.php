<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Attributes\Description;
use BenSampo\Enum\Enum;

final class AdminRole extends BaseEnum
{
    #[Description('Admin')]
    public const ADMIN = 0;

    #[Description('Product & warehouse')]
    public const PRODUCT_WAREHOUSE = 1;


}
