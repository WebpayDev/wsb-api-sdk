<?php
declare(strict_types = 1);

namespace Webpayby\WsbApi\Response;

/**
 * Interface ResponseInterface
 * @package Webpayby\WsbApi\Response
 */
interface ResponseInterface
{
    /**
     * @param array $param
     * @return $this
     */
    public function build(array $param): self;

    /**
     * @return array
     */
    public function toArray(): array;
}