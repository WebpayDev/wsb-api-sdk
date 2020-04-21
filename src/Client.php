<?php

namespace Webpay\WsbApi;

use SoapClient;

/**
 * Class Client
 * @package Webpay\WsbApi
 */
class Client extends SoapClient implements ClientInterface
{
    private $cache = self::NON_CACHE;

    /**
     * Client constructor.
     * @inheritDoc
     */
    public function __construct($wsdl, array $options = null)
    {
        $params = [
            'cache_wsdl' => $this->getCache()
        ];

        if (is_array($options)) {
            $params = array_merge($options, $params);
        }

        parent::__construct($wsdl, $params);
    }

    /**
     * @inheritDoc
     */
    public function setCache(int $v): ClientInterface
    {
        $this->cache = $v;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getCache(): int
    {
        return $this->cache;
    }
}