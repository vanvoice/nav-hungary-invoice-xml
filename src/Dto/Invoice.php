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

use Vanvo\NavInvoiceXml\InvoiceItemCollection;
use Vanvo\NavInvoiceXml\VatSummaryCollection;

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

    /** @var Partner */
    protected $issuer;

    /** @var Partner */
    protected $customer;

    /** @var InvoiceItemCollection */
    protected $invoiceItems;

    /** @var VatSummaryCollection */
    protected $vatSummaries;

    /** @var PriceSummary */
    protected $priceSummary;

    /** @var Misc */
    protected $misc;

    /**
     * Invoice constructor.
     *
     * @param string                $number
     * @param InvoiceType           $type
     * @param \DateTime             $issuedOn
     * @param \DateTime             $fulfillmentOn
     * @param Partner               $issuer
     * @param Partner               $customer
     * @param InvoiceItemCollection $invoiceItems
     * @param VatSummaryCollection  $vatSummaries
     * @param PriceSummary          $priceSummary
     * @param Misc                  $misc
     */
    public function __construct(string $number, InvoiceType $type, \DateTime $issuedOn, \DateTime $fulfillmentOn, Partner $issuer, Partner $customer, InvoiceItemCollection $invoiceItems, VatSummaryCollection $vatSummaries, PriceSummary $priceSummary, Misc $misc)
    {
        $this->number        = $number;
        $this->type          = $type;
        $this->issuedOn      = $issuedOn;
        $this->fulfillmentOn = $fulfillmentOn;
        $this->issuer        = $issuer;
        $this->customer      = $customer;
        $this->invoiceItems  = $invoiceItems;
        $this->vatSummaries  = $vatSummaries;
        $this->priceSummary  = $priceSummary;
        $this->misc          = $misc;
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

    /**
     * @return Partner
     */
    public function getIssuer(): Partner
    {
        return $this->issuer;
    }

    /**
     * @return Partner
     */
    public function getCustomer(): Partner
    {
        return $this->customer;
    }

    /**
     * @return InvoiceItemCollection
     */
    public function getInvoiceItems(): InvoiceItemCollection
    {
        return $this->invoiceItems;
    }

    /**
     * @return VatSummaryCollection
     */
    public function getVatSummaries(): VatSummaryCollection
    {
        return $this->vatSummaries;
    }

    /**
     * @return PriceSummary
     */
    public function getPriceSummary(): PriceSummary
    {
        return $this->priceSummary;
    }

    /**
     * @return Misc
     */
    public function getMisc(): Misc
    {
        return $this->misc;
    }
}
