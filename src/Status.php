<?php
declare(strict_types = 1);

namespace Webpayby\WsbApi;

/**
 * Class Status
 * @package Webpayby\WsbApi
 */
final class Status
{
    public const COMPLETED  = 'Completed';
    public const AUTHORIZED = 'Authorized';
    public const REFUNDED   = 'Refunded';
    public const SYSTEM     = 'System';
    public const VOIDED     = 'Voided';
    public const FAILED     = 'Failed';

    /**
     * @return array
     */
    public static function all(): array
    {
        return [self::COMPLETED, self::AUTHORIZED, self::REFUNDED, self::SYSTEM, self::VOIDED, self::FAILED];
    }

    /**
     * @param string $v
     * @return bool
     */
    public static function isExist(string $v): bool
    {
        return in_array($v, self::all(), true);
    }
}