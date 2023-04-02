<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Attributes\Description;
use BenSampo\Enum\Enum;

final class AdminRole extends Enum
{
    #[Description('Quản lý')]
    public const ADMIN = 0;
}
