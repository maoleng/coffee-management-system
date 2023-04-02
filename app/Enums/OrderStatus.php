<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class OrderStatus extends Enum
{
    public const UNPROCESSED = 0;
    public const DELIVER = 1;
    public const PAY_ONLINE = 2;
    public const CANCEL = 3;
    public const DESTROY = 4;

}
