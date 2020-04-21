<?php
declare(strict_types = 1);

namespace Webpay\WsbApi;

/**
 * Interface ClientInterface
 * @package Webpay\WsbApi
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