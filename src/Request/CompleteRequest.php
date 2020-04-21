<?php
declare(strict_types = 1);

namespace Webpay\WsbApi\Request;

use Webpay\WsbApi\Response\Response;
use Webpay\WsbApi\Response\ResponseInterface;
use Webpay\WsbApi\TransactionException;

/**
 * Class CompleteRequest
 * @package Webpay\WsbApi\Request
 */
class CompleteRequest extends Request
{
    use TransactionTrait;

    /**
     * @inheritDoc
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
        ];

        try {
            $response = $client->TransactionComplete($params);
        } catch (\Throwable $e) {
            throw new TransactionException($e->getMessage(), 500);
        }

        return (new Response())->build((array)$response);
    }
}