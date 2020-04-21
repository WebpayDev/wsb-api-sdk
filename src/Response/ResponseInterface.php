<?php
declare(strict_types = 1);

namespace Webpay\WsbApi\Response;

/**
 * Interface ResponseInterface
 * @package Webpay\WsbApi\Response
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