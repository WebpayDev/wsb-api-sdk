<?php
declare(strict_types = 1);

namespace Webpayby\WsbApi\Response;

use Webpayby\WsbApi\TransactionStatusStruct;

/**
 * Class TransactionStatusResponse
 * @package Webpayby\WsbApi\Response
 */
class TransactionStatusResponse implements ResponseInterface
{
    private $errorComment;
    private $errorCode;
    private $transaction;

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
     * @return array
     */
    public function getTransaction(): array
    {
        return $this->transaction;
    }

    /**
     * @inheritDoc
     */
    public function build(array $param): ResponseInterface
    {
        $this->errorComment = $param['error_comment'];
        $this->errorCode = $param['error_code'];
        $this->transaction = array_map(static function ($values) {
            return (new TransactionStatusStruct())->build((array)$values);
        }, $param['transaction']);


        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'errorComment' => $this->getErrorComment(),
            'transaction' => $this->getTransaction(),
            'errorCode' => $this->getErrorCode()
        ];
    }
}
