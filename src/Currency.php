<?php
declare(strict_types = 1);

namespace Webpay\WsbApi;

/**
 * Class Currency
 * @package Webpay\WsbApi
 */
final class Currency
{
    public const BYN = 'BYN';
    public const RUB = 'RUB';
    public const USD = 'USD';
    public const EUR = 'EUR';

    /**
     * @return array
     */
    public static function all(): array
    {
        return [self::BYN, self::RUB, self::USD, self::EUR];
    }

    /**
     * @param string $value
     * @return bool
     */
    public static function isExist(string $value): bool
    {
        return in_array($value, self::all(), true);
    }
}