<?php
declare(strict_types = 1);

namespace Webpayby\WsbApi\Request;

use Webpayby\WsbApi\Client;
use Webpayby\WsbApi\ClientInterface;
use Webpayby\WsbApi\Response\ResponseInterface;

/**
 * Class Request
 * @package Webpayby\WsbApi\Request
 */
abstract class Request
{
    private $endpointApi;
    private $login;
    private $password;
    private $billingId;

    /**
     * Request constructor.
     * @param string $host
     * @param string $login
     * @param string $password
     * @param string $billingId
     */
    public function __construct(string $host, string $login, string $password, string $billingId)
    {
        $this
            ->setEndpointApi($host)
            ->setLogin($login)
            ->setPassword($this->encrypt($password))
            ->setBillingId($billingId);
    }

    /**
     * @return ResponseInterface
     */
    abstract public function send(): ResponseInterface;

    /**
     * @param string $url
     * @return $this
     */
    public function setEndpointApi(string $url): self
    {
        $this->endpointApi = $url;

        return $this;
    }

    /**
     * @return string
     */
    protected function getEndpointApi(): string
    {
        return $this->endpointApi;
    }

    /**
     * @param string $login
     * @return $this
     */
    protected function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    /**
     * @return string
     */
    protected function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $password
     * @return $this
     */
    protected function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    protected function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $billingId
     * @return $this
     */
    protected function setBillingId(string $billingId): self
    {
        $this->billingId = $billingId;

        return $this;
    }

    /**
     * @return string
     */
    protected function getBillingId(): string
    {
        return $this->billingId;
    }

    /**
     * @return ClientInterface
     * @throws \SoapFault
     */
    protected function buildTransfer(): ClientInterface
    {
        return new Client($this->getEndpointApi());
    }

    /**
     * @param string $string
     * @return string
     */
    private function encrypt(string $string): string
    {
        return md5($string);
    }
}