<?php
declare(strict_types = 1);

namespace Webpay\WsbApi\Request;

use Webpay\WsbApi\Response\TransactionStatusResponse;
use Webpay\WsbApi\Response\ResponseInterface;
use Webpay\WsbApi\TransactionException;

/**
 * Class GetTransactionStatusRequest
 * @package Webpay\WsbApi\Request
 */
class GetTransactionStatusRequest extends Request
{
    private $orderNum;
    private $startMin;
    private $startHour;
    private $startDay;
    private $startMonth;
    private $startYear;
    private $endMin;
    private $endHour;
    private $endDay;
    private $endMonth;
    private $endYear;

    /**
     * @return string|null
     */
    public function getOrderNum(): ?string
    {
        return $this->orderNum;
    }

    /**
     * @return string|null
     */
    public function getStartMin(): ?string
    {
        return $this->startMin;
    }

    /**
     * @return string|null
     */
    public function getStartHour(): ?string
    {
        return $this->startHour;
    }

    /**
     * @return string|null
     */
    public function getStartDay(): ?string
    {
        return $this->startDay;
    }

    /**
     * @return string
     */
    public function getStartMonth(): string
    {
        return $this->startMonth;
    }

    /**
     * @return string
     */
    public function getStartYear(): string
    {
        return $this->startYear;
    }

    /**
     * @return string|null
     */
    public function getEndMin(): ?string
    {
        return $this->endMin;
    }

    /**
     * @return string|null
     */
    public function getEndHour(): ?string
    {
        return $this->endHour;
    }

    /**
     * @return string|null
     */
    public function getEndDay(): ?string
    {
        return $this->endDay;
    }

    /**
     * @return string|null
     */
    public function getEndMonth(): ?string
    {
        return $this->endMonth;
    }

    /**
     * @return string|null
     */
    public function getEndYear(): ?string
    {
        return $this->endYear;
    }

    /**
     * @param string|null $orderNum
     * @return $this
     */
    public function setOrderNum(?string $orderNum): self
    {
        $this->orderNum = $orderNum;

        return $this;
    }

    /**
     * @param string|null $startMin
     * @return $this
     */
    public function setStartMin(?string $startMin): self
    {
        $this->startMin = $startMin;

        return $this;
    }

    /**
     * @param string|null $startHour
     * @return $this
     */
    public function setStartHour(?string $startHour): self
    {
        $this->startHour = $startHour;

        return $this;
    }

    /**
     * @param string|null $startDay
     * @return $this
     */
    public function setStartDay(?string $startDay): self
    {
        $this->startDay = $startDay;

        return $this;
    }

    /**
     * @param string $startMonth
     * @return $this
     */
    public function setStartMonth(string $startMonth): self
    {
        $this->startMonth = $startMonth;

        return $this;
    }

    /**
     * @param string $startYear
     * @return $this
     */
    public function setStartYear(string $startYear): self
    {
        $this->startYear = $startYear;

        return $this;
    }

    /**
     * @param string|null $endMin
     * @return $this
     */
    public function setEndMin(?string $endMin): self
    {
        $this->endMin = $endMin;

        return $this;
    }

    /**
     * @param string|null $endHour
     * @return $this
     */
    public function setEndHour(?string $endHour): self
    {
        $this->endHour = $endHour;

        return $this;
    }

    /**
     * @param string|null $endDay
     * @return $this
     */
    public function setEndDay(?string $endDay): self
    {
        $this->endDay = $endDay;

        return $this;
    }

    /**
     * @param string|null $endMonth
     * @return $this
     */
    public function setEndMonth(?string $endMonth): self
    {
        $this->endMonth = $endMonth;

        return $this;
    }

    /**
     * @param string|null $endYear
     * @return $this
     */
    public function setEndYear(?string $endYear): self
    {
        $this->endYear = $endYear;

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
            'order_num' => $this->getOrderNum(),
            'startmin' => $this->getStartMin(),
            'starthour' => $this->getStartHour(),
            'startday' => $this->getStartDay(),
            'startmonth' => $this->getStartMonth(),
            'startyear' => $this->getStartYear(),
            'endmin' => $this->getEndMin(),
            'endhour' => $this->getEndHour(),
            'endday' => $this->getEndDay(),
            'endmonth' => $this->getEndMonth(),
            'endyear' => $this->getEndYear(),
        ];

        try {
            $response = $client->GetTransactionStatus($params);
        } catch (\Throwable $e) {
            throw new TransactionException($e->getMessage(), 500);
        }

        return (new TransactionStatusResponse())->build((array)$response);
    }
}