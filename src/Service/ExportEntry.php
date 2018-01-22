<?php
/**
 * Contains the ExportEntry class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-22
 *
 */

namespace Vanvo\NavInvoiceXml\Service;

use Vanvo\NavInvoiceXml\Dto\Address;
use Vanvo\NavInvoiceXml\Dto\Invoice;
use Vanvo\NavInvoiceXml\Dto\Misc;
use Vanvo\NavInvoiceXml\Dto\Partner;
use Vanvo\NavInvoiceXml\Dto\PriceSummary;
use Vanvo\NavInvoiceXml\Models\InvoiceItemCollection;
use Vanvo\NavInvoiceXml\Models\VatSummaryCollection;

class ExportEntry
{
    /** @var Invoice */
    protected $invoice;

    /** @var Partner */
    protected $issuer;

    /** @var Address */
    protected $issuerAddress;

    /** @var Partner */
    protected $customer;

    /** @var Address */
    protected $customerAddress;

    /** @var InvoiceItemCollection */
    protected $invoiceItems;

    /** @var Misc */
    protected $misc;

    /** @var VatSummaryCollection */
    protected $vatSummaries;

    /** @var PriceSummary */
    protected $priceSummary;

    /**
     * ExportEntry constructor.
     *
     * @param Invoice               $invoice
     * @param Partner               $issuer
     * @param Address               $issuerAddress
     * @param Partner               $customer
     * @param Address               $customerAddress
     * @param InvoiceItemCollection $invoiceItems
     * @param Misc                  $misc
     * @param VatSummaryCollection  $vatSummaries
     * @param PriceSummary          $priceSummary
     */
    public function __construct(Invoice $invoice, Partner $issuer, Address $issuerAddress, Partner $customer, Address $customerAddress, InvoiceItemCollection $invoiceItems, Misc $misc, VatSummaryCollection $vatSummaries, PriceSummary $priceSummary)
    {
        $this->invoice         = $invoice;
        $this->issuer          = $issuer;
        $this->issuerAddress   = $issuerAddress;
        $this->customer        = $customer;
        $this->customerAddress = $customerAddress;
        $this->invoiceItems    = $invoiceItems;
        $this->misc            = $misc;
        $this->vatSummaries    = $vatSummaries;
        $this->priceSummary    = $priceSummary;
    }

    /**
     * @return Invoice
     */
    public function getInvoice(): Invoice
    {
        return $this->invoice;
    }

    /**
     * @return Partner
     */
    public function getIssuer(): Partner
    {
        return $this->issuer;
    }

    /**
     * @return Address
     */
    public function getIssuerAddress(): Address
    {
        return $this->issuerAddress;
    }

    /**
     * @return Partner
     */
    public function getCustomer(): Partner
    {
        return $this->customer;
    }

    /**
     * @return Address
     */
    public function getCustomerAddress(): Address
    {
        return $this->customerAddress;
    }

    /**
     * @return InvoiceItemCollection
     */
    public function getInvoiceItems(): InvoiceItemCollection
    {
        return $this->invoiceItems;
    }

    /**
     * @return Misc
     */
    public function getMisc(): Misc
    {
        return $this->misc;
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
}
