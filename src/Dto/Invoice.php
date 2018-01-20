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

class Invoice
{
    /** @var string */
    protected $number;

    /** @var InvoiceType */
    protected $type;

    /** @var \DateTime */
    protected $issuedOn;

    /** @var \DateTime */
    protected $fulfillmentOn;

    /**
     * Invoice constructor.
     *
     * @param string      $number
     * @param InvoiceType $type
     * @param \DateTime   $issuedOn
     * @param \DateTime   $fulfillmentOn
     */
    public function __construct(string $number, InvoiceType $type, \DateTime $issuedOn, \DateTime $fulfillmentOn)
    {
        $this->number        = $number;
        $this->type          = $type;
        $this->issuedOn      = $issuedOn;
        $this->fulfillmentOn = $fulfillmentOn;
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
    public function getFulfillmentOn(): \DateTime
    {
        return $this->fulfillmentOn;
    }
}
