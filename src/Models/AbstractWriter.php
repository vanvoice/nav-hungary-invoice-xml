<?php
/**
 * Contains the AbstractWriter class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-19
 *
 */

namespace Vanvo\NavInvoiceXml\Models;

use Vanvo\NavInvoiceXml\Dto\Invoice;
use Vanvo\NavInvoiceXml\Dto\Person;

abstract class AbstractWriter
{
    /** @var string */
    protected $version;

    /** @var string */
    private $buffer = '';

    /**
     * @param string $line
     *
     * @return AbstractWriter
     */
    public function append(string $line): AbstractWriter
    {
        $this->buffer .= $line;

        return $this;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @return string
     */
    public function getBuffer(): string
    {
        return $this->buffer;
    }

    /**
     * Adds the issuer to the buffer.
     *
     * @param Person $issuer
     *
     * @return AbstractWriter
     */
    abstract public function addIssuer(Person $issuer): AbstractWriter;

    /**
     * Adds the customer to the buffer.
     *
     * @param Person $customer
     *
     * @return AbstractWriter
     */
    abstract public function addCustomer(Person $customer): AbstractWriter;

    /**
     * Adds the invoice to the buffer.
     *
     * @param Invoice $invoice
     *
     * @return AbstractWriter
     */
    abstract public function addInvoice(Invoice $invoice): AbstractWriter;

//    abstract public function addInvoiceItems(InvoiceItemCollection $invoiceItemCollection): AbstractWriter;
//
//    abstract public function addPriceSummary(PriceSummary $priceSummary): AbstractWriter;
//
//    abstract public function addVatSummary(VatSummaryCollection $vatSummaryCollection): AbstractWriter;
//
//    abstract public function addMisc(Invoice $invoice): AbstractWriter;
}
