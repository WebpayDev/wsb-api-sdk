<?php
declare(strict_types = 1);

namespace Webpay\WsbApi\Request;

use Webpay\WsbApi\Response\Response;
use Webpay\WsbApi\Response\ResponseInterface;
use Webpay\WsbApi\TransactionException;

/**
 * Class CompleteWithSouRequest
 * @package Webpay\WsbApi\Request
 */
class CompleteWithSouRequest extends Request
{
    use TransactionTrait;

    private $serviceNumber;
    private $serviceAccount;

    /**
     * @return string
     */
    public function getServiceNumber(): string
    {
        return $this->serviceNumber;
    }

    /**
     * @param string $serviceNumber
     * @return $this
     */
    public function setServiceNumber(string $serviceNumber): self
    {
        $this->serviceNumber = $serviceNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getServiceAccount(): string
    {
        return $this->serviceAccount;
    }

    /**
     * @param string $serviceAccount
     * @return $this
     */
    public function setServiceAccount(string $serviceAccount): self
    {
        $this->serviceAccount = $serviceAccount;

        return $this;
    }

    /**
     * @return ResponseInterface
     * @throws TransactionException
     * @throws \SoapFault
     */
    public function send(): ResponseInterface
    {
        $client = $this->buildTransfer();

        $params = [
            'store_id' => $this->getBillingId(),
            'login' => $this->getLogin(),
            'password' => $this->getPassword(),
            'transaction_id' => $this->getTransactionId(),
            'amount' => $this->getAmount(),
            'currency' => $this->getCurrency(),
            'service_number' => $this->getServiceNumber(),
            'service_account' => $this->getServiceAccount()
        ];

        try {
            $response = $client->TransactionCompleteWithSou($params);
        } catch (\Throwable $e) {
            throw new TransactionException($e->getMessage(), 500);
        }

        return (new Response())->build((array)$response);
    }
}