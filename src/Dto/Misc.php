<?php
/**
 * Contains the Misc class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-20
 *
 */

namespace Vanvo\NavInvoiceXml\Dto;

class Misc
{
    /** @var \DateTime|null */
    protected $dueOn;

    /** @var string|null */
    protected $paymentMethod;

    /** @var string|null */
    protected $currency;

    /** @var string|null */
    protected $bankAccountNumber;

    /**
     * Misc constructor.
     *
     * @param \DateTime|null $dueOn
     * @param null|string    $paymentMethod
     * @param null|string    $currency
     * @param null|string    $bankAccountNumber
     */
    public function __construct(?\DateTime $dueOn, ?string $paymentMethod, ?string $currency, ?string $bankAccountNumber)
    {
        $this->dueOn             = $dueOn;
        $this->paymentMethod     = $paymentMethod;
        $this->currency          = $currency;
        $this->bankAccountNumber = $bankAccountNumber;
    }

    /**
     * @return \DateTime|null
     */
    public function getDueOn(): ?\DateTime
    {
        return $this->dueOn;
    }

    /**
     * @return null|string
     */
    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    /**
     * @return null|string
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @return null|string
     */
    public function getBankAccountNumber(): ?string
    {
        return $this->bankAccountNumber;
    }
}
