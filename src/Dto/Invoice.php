<?php
/**
 * Contains the Invoice class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2018-01-19
 *
 */

namespace Vanvo\NavInvoiceXml\Dto;

use Vanvo\NavInvoiceXml\Enums\InvoiceType;

class Invoice
{
    /** @var string */
    protected $number;

    /** @var InvoiceType */
    protected $type;

    /** @var \DateTime */
    protected $issuedOn;

    /** @var \DateTime */
    protected $dueOn;

    /** @var \DateTime */
    protected $fulfillmentOn;

    /** @var string|null */
    protected $bankAccountNumber;

    /** @var string */
    protected $currency;

    /** @var string|null */
    protected $paymentMethod;

    /**
     * Invoice constructor.
     *
     * @param string      $number
     * @param InvoiceType $type
     * @param \DateTime   $issuedOn
     * @param \DateTime   $dueOn
     * @param \DateTime   $fulfillmentOn
     * @param null|string $bankAccountNumber
     * @param string      $currency
     * @param string      $paymentMethod
     */
    public function __construct(string $number, InvoiceType $type, \DateTime $issuedOn, \DateTime $dueOn, \DateTime $fulfillmentOn, string $currency, string $bankAccountNumber = null, $paymentMethod = null)
    {
        $this->number            = $number;
        $this->type              = $type;
        $this->issuedOn          = $issuedOn;
        $this->dueOn             = $dueOn;
        $this->fulfillmentOn     = $fulfillmentOn;
        $this->bankAccountNumber = $bankAccountNumber;
        $this->currency          = $currency;
        $this->paymentMethod     = $paymentMethod;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @return InvoiceType
     */
    public function getType(): InvoiceType
    {
        return $this->type;
    }

    /**
     * @return \DateTime
     */
    public function getIssuedOn(): \DateTime
    {
        return $this->issuedOn;
    }

    /**
     * @return \DateTime
     */
    public function getDueOn(): \DateTime
    {
        return $this->dueOn;
    }

    /**
     * @return \DateTime
     */
    public function getFulfillmentOn(): \DateTime
    {
        return $this->fulfillmentOn;
    }

    /**
     * @return null|string
     */
    public function getBankAccountNumber(): ?string
    {
        return $this->bankAccountNumber;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return string
     */
    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }
}
