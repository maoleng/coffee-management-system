<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Attributes\Description;
use BenSampo\Enum\Enum;

final class PostCategory extends BaseEnum
{
    #[Description('CoffeeHolic Story')]
    public const COFFEEHOLIC = 0;

    #[Description('Blog')]
    public const BLOG = 1;

    #[Description('TeaHolic Story')]
    public const TEAHOLIC = 2;

}
