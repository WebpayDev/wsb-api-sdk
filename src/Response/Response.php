<?php
declare(strict_types = 1);

namespace Webpayby\WsbApi\Response;

/**
 * Class Response
 * @package Webpayby\WsbApi\Response
 */
class Response implements ResponseInterface
{
    private $errorComment;
    private $errorCode;
    private $transactionId;

    /**
     * @return string
     */
    public function getErrorComment(): string
    {
        return $this->errorComment;
    }

    /**
     * @return string
     */
    public function getErrorCode(): string
    {
        return $this->errorCode;
    }

    /**
     * @return string|null
     */
    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    /**
     * @inheritDoc
     */
    public function build(array $param): ResponseInterface
    {
        $this->errorComment = $param['error_comment'];
        $this->errorCode = $param['error_code'];
        $this->transactionId = $param['transaction_id'];

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'errorComment' => $this->getErrorComment(),
            'transactionId' => $this->getTransactionId(),
            'errorCode' => $this->getErrorCode()
        ];
    }
}
