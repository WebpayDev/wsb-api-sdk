<?php

namespace Webpayby\WsbApi\Tests\Request;

use PHPUnit\Framework\TestCase;
use Webpayby\WsbApi\Currency;
use Webpayby\WsbApi\Request\CancelRequest;
use Webpayby\WsbApi\Request\CompleteRequest;
use Webpayby\WsbApi\Request\CompleteWithSouRequest;
use Webpayby\WsbApi\Request\GetTransactionStatusRequest;
use Webpayby\WsbApi\Request\RefundRequest;
use Webpayby\WsbApi\Response\ResponseInterface;

class RequestTest extends TestCase
{
    public const LOGIN = 'root';
    public const PASSWORD = '123';
    public const HOST = 'http://wsbill.wp.lo/WSBApi';
    public const BILLING_ID = '1';

    public function testRefundRequest()
    {
        $response = (new RefundRequest(self::HOST, self::LOGIN, self::PASSWORD, self::BILLING_ID))
            ->setAmount('5.00')
            ->setCurrency(Currency::BYN)
            ->setTransactionId('956424424')
            ->setReason('by client request')
            ->send();


        $this->assertInstanceOf(ResponseInterface::class, $response);
    }

    public function testCancelRequest()
    {
        $response = (new CancelRequest(self::HOST, self::LOGIN, self::PASSWORD, self::BILLING_ID))
            ->setAmount('5.00')
            ->setCurrency(Currency::BYN)
            ->setTransactionId('956424424')
            ->setReason('by client request')
            ->send();


        $this->assertInstanceOf(ResponseInterface::class, $response);
    }

    public function testCompleteRequest()
    {
        $response = (new CompleteRequest(self::HOST, self::LOGIN, self::PASSWORD, self::BILLING_ID))
            ->setAmount('5.00')
            ->setCurrency(Currency::BYN)
            ->setTransactionId('956424424')
            ->send();


        $this->assertInstanceOf(ResponseInterface::class, $response);
    }

    public function testCompleteWithSouRequest()
    {
        $response = (new CompleteWithSouRequest(self::HOST, self::LOGIN, self::PASSWORD, self::BILLING_ID))
            ->setAmount('5.00')
            ->setCurrency(Currency::BYN)
            ->setTransactionId('956424424')
            ->setServiceNumber('391871')
            ->setServiceAccount('11111111111111')
            ->send();

        $this->assertInstanceOf(ResponseInterface::class, $response);
    }

    public function testGetTransactionStatusRequest()
    {
        $response = (new GetTransactionStatusRequest(self::HOST, self::LOGIN, self::PASSWORD, self::BILLING_ID))
            ->setStartYear('2019')
            ->setStartMonth('01')
            ->send();


        $this->assertInstanceOf(ResponseInterface::class, $response);
    }
}