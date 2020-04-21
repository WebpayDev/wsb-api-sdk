<?php
declare(strict_types = 1);

namespace Webpay\WsbApi;

use InvalidArgumentException;

/**
 * Class TransactionStatusStruct
 * @package Webpay\WsbApi
 */
class TransactionStatusStruct
{
    private $orderNum;
    private $transactionId;
    private $date;
    private $status;
    private $amount;
    private $currency;
    private $responseCode;
    private $responseText;
    private $approvalCode;
    private $cardType;
    private $cardNumber;
    private $cardCountry;
    private $payerName;
    private $payerEmail;
    private $payerIP;
    private $paymentType;
    private $comment;

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
    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    /**
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @return string|null
     */
    public function getAmount(): ?string
    {
        return $this->amount;
    }

    /**
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @return string|null
     */
    public function getResponseCode(): ?string
    {
        return $this->responseCode;
    }

    /**
     * @return string|null
     */
    public function getResponseText(): ?string
    {
        return $this->responseText;
    }

    /**
     * @return string|null
     */
    public function getApprovalCode(): ?string
    {
        return $this->approvalCode;
    }

    /**
     * @return string|null
     */
    public function getCardType(): ?string
    {
        return $this->cardType;
    }

    /**
     * @return string|null
     */
    public function getCardNumber(): ?string
    {
        return $this->cardNumber;
    }

    /**
     * @return string|null
     */
    public function getCardCountry(): ?string
    {
        return $this->cardCountry;
    }

    /**
     * @return string|null
     */
    public function getPayerName(): ?string
    {
        return $this->payerName;
    }

    /**
     * @return string|null
     */
    public function getPayerEmail(): ?string
    {
        return $this->payerEmail;
    }

    /**
     * @return string|null
     */
    public function getPayerIP(): ?string
    {
        return $this->payerIP;
    }

    /**
     * @return string|null
     */
    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
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
     * @param string|null $transactionId
     * @return $this
     */
    public function setTransactionId(?string $transactionId): self
    {
        $this->transactionId = $transactionId;

        return $this;
    }

    /**
     * @param string|null $date
     * @return $this
     */
    public function setDate(?string $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @param string|null $status
     * @return $this
     */
    public function setStatus(?string $status): self
    {
        if ($status !== null && !Status::isExist($status)) {
            throw new InvalidArgumentException($status . ' does not exist. Please look at ' . Status::class);
        }

        $this->status = $status;

        return $this;
    }

    /**
     * @param string|null $amount
     * @return $this
     */
    public function setAmount(?string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param string|null $value
     * @return $this
     */
    public function setCurrency(?string $value): self
    {
        if ($value !== null && !Currency::isExist($value)) {
            throw new InvalidArgumentException($value . ' does not exist. Please look at ' . Currency::class);
        }

        $this->currency = $value;

        return $this;
    }

    /**
     * @param string|null $code
     * @return $this
     */
    public function setResponseCode(?string $code): self
    {
        $this->responseCode = $code;

        return $this;
    }

    /**
     * @param string|null $responseText
     * @return $this
     */
    public function setResponseText(?string $responseText): self
    {
        $this->responseText = $responseText;

        return $this;
    }

    /**
     * @param string|null $approvalCode
     * @return $this
     */
    public function setApprovalCode(?string $approvalCode): self
    {
        $this->approvalCode = $approvalCode;

        return $this;
    }

    /**
     * @param string|null $cardType
     * @return $this
     */
    public function setCardType(?string $cardType): self
    {
        $this->cardType = $cardType;

        return $this;
    }

    /**
     * @param string|null $cardNumber
     * @return $this
     */
    public function setCardNumber(?string $cardNumber): self
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    /**
     * @param string|null $cardCountry
     * @return $this
     */
    public function setCardCountry(?string $cardCountry): self
    {
        $this->cardCountry = $cardCountry;

        return $this;
    }

    /**
     * @param string|null $payerName
     * @return $this
     */
    public function setPayerName(?string $payerName): self
    {
        $this->payerName = $payerName;

        return $this;
    }

    /**
     * @param string|null $payerEmail
     * @return $this
     */
    public function setPayerEmail(?string $payerEmail): self
    {
        $this->payerEmail = $payerEmail;

        return $this;
    }

    /**
     * @param string|null $payerIP
     * @return $this
     */
    public function setPayerIP(?string $payerIP): self
    {
        $this->payerIP = $payerIP;

        return $this;
    }

    /**
     * @param string|null $type
     * @return $this
     */
    public function setPaymentType(?string $type): self
    {
        $this->paymentType = $type;

        return $this;
    }

    /**
     * @param string|null $comment
     * @return $this
     */
    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @param array $params
     * @return $this
     */
    public function build(array $params): self
    {
        return (new self())
            ->setTransactionId($params['transaction_id'])
            ->setDate($params['date'])
            ->setStatus($params['status'])
            ->setAmount($params['amount'])
            ->setCurrency($params['currency'])
            ->setResponseCode($params['response_code'])
            ->setResponseText($params['response_text'])
            ->setApprovalCode($params['approval_code'])
            ->setCardType($params['card_type'])
            ->setCardNumber($params['card_number'])
            ->setCardCountry($params['card_country'])
            ->setPayerName($params['payer_name'])
            ->setPayerEmail($params['payer_email'])
            ->setPayerIP($params['payer_ip'])
            ->setPaymentType($params['payment_type'])
            ->setComment($params['comment']);
    }
}
