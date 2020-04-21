<?php
declare(strict_types = 1);

namespace Webpayby\WsbApi\Request;

use Webpayby\WsbApi\Response\Response;
use Webpayby\WsbApi\Response\ResponseInterface;
use Webpayby\WsbApi\TransactionException;

/**
 * Class CompleteRequest
 * @package Webpayby\WsbApi\Request
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