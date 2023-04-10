<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class SupportStatus extends BaseEnum
{
    public const UNPROCESSED = 0;
    public const SUCCESSFUL = 1;
    public const FILTERED = 2;

}
