<?php
declare(strict_types = 1);

namespace Webpay\WsbApi\Request;

use InvalidArgumentException;
use Webpay\WsbApi\Currency;

/**
 * Trait TransactionTrait
 * @package Webpay\WsbApi\Request
 */
trait TransactionTrait
{
    private $transactionId;
    private $amount;
    private $currency;

    /**
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transactionId;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setTransactionId(string $id): self
    {
        $this->transactionId = $id;

        return $this;
    }

    /**
     * @param string $amount
     * @return $this
     */
    public function setAmount(string $amount): self
    {
        $amountRuleReg = '/^\d+\.\d{2}$/';

        if (!preg_match($amountRuleReg, $amount)) {
            throw new InvalidArgumentException(
                $amount . ' is invalid. Amount should be in the following format "\d+\.\d{2}"'
            );
        }

        $this->amount = $amount;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setCurrency(string $value): self
    {
        if (!Currency::isExist($value)) {
            throw new InvalidArgumentException($value . ' does not exist. Please look at ' . Currency::class);
        }

        $this->currency = $value;

        return $this;
    }
}
