<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class OrderStatus extends Enum
{
    public const UNPROCESSED = 0;
    public const DELIVERING = 1;
    public const CANCELLED = 2;
    public const SUCCESSFUL = 3;
    public const DESTROY = 4;

}
