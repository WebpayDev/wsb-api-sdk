<?php
declare(strict_types = 1);

namespace Webpayby\WsbApi\Request;

use Webpayby\WsbApi\Response\Response;
use Webpayby\WsbApi\Response\ResponseInterface;
use Webpayby\WsbApi\TransactionException;

/**
 * Class RefundRequest
 * @package Webpayby\WsbApi\Request
 */
class RefundRequest extends Request
{
    use TransactionTrait;

    private $reason;

    /**
     * @return string
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     * @return $this
     */
    public function setReason(string $reason): self
    {
        $this->reason = $reason;

        return $this;
    }

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
            'amount' => (string)$this->getAmount(),
            'currency' => $this->getCurrency(),
            'refund_reason' => $this->getReason()
        ];

        try {
            $response = $client->TransactionRefund($params);
        } catch (\Throwable $e) {
            throw new TransactionException($e->getMessage(), 500);
        }

        return (new Response())->build((array)$response);
    }
}