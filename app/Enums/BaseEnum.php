<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Attributes\Description;
use BenSampo\Enum\Enum;

class BaseEnum extends Enum
{

    public static function getDescriptions(): array
    {
        $constants = self::getConstants();
        $descriptions = [];
        foreach ($constants as $constant) {
            $descriptions[$constant] = self::getDescription($constant);
        }

        return $descriptions;
    }

}
