<?php
declare(strict_types = 1);

namespace Webpayby\WsbApi;

/**
 * Interface ClientInterface
 * @package Webpayby\WsbApi
 */
interface ClientInterface
{
    public const NON_CACHE = 0;

    /**
     * @param int $v
     * @return $this
     */
    public function setCache(int $v): self;

    /**
     * @return int
     */
    public function getCache(): int;
}