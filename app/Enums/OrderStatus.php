<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Attributes\Description;

final class OrderStatus extends BaseEnum
{
    #[Description('Unprocessed')]
    public const UNPROCESSED = 0;

    #[Description('Delivering')]
    public const DELIVERING = 1;

    #[Description('Cancelled')]
    public const CANCELLED = 2;

    #[Description('Decline')]
    public const DECLINE = 3;

    #[Description('Successful')]
    public const SUCCESSFUL = 4;

    #[Description('Destroy')]
    public const DESTROY = 5;

    public static function getDropdownOrderStatus($order): string
    {
        return match ($order->status) {
            self::UNPROCESSED => "
                <a data-status='1' data-order_id='$order->id' class='i-status dropdown-item' href='#'>Delivering</a>
                <a data-status='3' data-order_id='$order->id' class='i-status dropdown-item' href='#'>Decline</a>
            ",
            self::DELIVERING => "
                <a data-status='4' data-order_id='$order->id' class='i-status dropdown-item' href='#'>Successful</a>
            ",
            default => '',
        };
    }
}
