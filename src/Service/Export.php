<?php
/**
 * Contains the Export class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-22
 *
 */

namespace Vanvo\NavInvoiceXml\Service;

use Vanvo\NavInvoiceXml\Dto\Invoice;
use Vanvo\NavInvoiceXml\InvoiceCollection;
use Vanvo\NavInvoiceXml\AddressXml;
use Vanvo\NavInvoiceXml\InvoiceItemXml;
use Vanvo\NavInvoiceXml\InvoiceXml;
use Vanvo\NavInvoiceXml\MiscXml;
use Vanvo\NavInvoiceXml\PartnerXml;
use Vanvo\NavInvoiceXml\PriceSummaryXml;
use Vanvo\NavInvoiceXml\VatSummaryXml;
use Vanvo\NavInvoiceXml\Xml;

class Export extends Xml
{
    /** @var InvoiceCollection */
    protected $invoiceCollection;

    /**
     * Export constructor.
     *
     * @param InvoiceCollection $invoiceCollection
     */
    public function __construct(InvoiceCollection $invoiceCollection)
    {
        parent::__construct();

        $this->invoiceCollection = $invoiceCollection;
    }

    public function build(): self
    {
        $invoices = $this->createElement('szamlak');

        foreach ($this->invoiceCollection as $invoice) {
            $invoiceNode = $this->createElement('szamla');
            $invoices->appendChild($invoiceNode);

            $this->merge($invoiceNode, InvoiceXml::createXml($invoice));

            $issuerNode = $this->createElement('szamlakibocsato');


            $this->merge($issuerNode, PartnerXml::createXml($invoice->getIssuer()));
            $this->merge($issuerNode, AddressXml::createXml($invoice->getIssuer()->getAddress()));
            $invoiceNode->appendChild($issuerNode);

            $customerNode = $this->createElement('vevo');
            $this->merge($customerNode, PartnerXml::createXml($invoice->getCustomer()));
            $this->merge($customerNode, AddressXml::createXml($invoice->getCustomer()->getAddress()));
            $invoiceNode->appendChild($customerNode);

            foreach ($invoice->getInvoiceItems() as $item) {
                $this->merge($invoiceNode, InvoiceItemXml::createXml($item));
            }

            $this->merge($invoiceNode, MiscXml::createXml($invoice->getMisc()));

            $totalsNode = $this->createElement('osszesites');

            foreach ($invoice->getVatSummaries() as $vatSummary) {
                $this->merge($totalsNode, VatSummaryXml::createXml($vatSummary));
            }

            $this->merge($totalsNode, PriceSummaryXml::createXml($invoice->getPriceSummary()));

            $invoiceNode->appendChild($totalsNode);
        }

        $exportDate = (new \DateTime())->format('Y-m-d');
        /** @var Invoice $firstItem */
        $firstItem = $this->invoiceCollection->first();
        $lastItem  = $this->invoiceCollection->last();


        $this->insert($invoices, $this->createElement('export_datuma', $exportDate), 0);
        $this->insert($invoices, $this->createElement('export_szla_db', $this->invoiceCollection->count()), 1);
        $this->insert($invoices, $this->createElement('kezdo_ido', $firstItem->getIssuedOn()->format('Y-m-d')), 2);
        $this->insert($invoices, $this->createElement('zaro_ido', $lastItem->getIssuedOn()->format('Y-m-d')), 3);
        $this->insert($invoices, $this->createElement('kezdo_szla_szam', $firstItem->getNumber()), 4);
        $this->insert($invoices, $this->createElement('zaro_szla_szam', $lastItem->getNumber()), 5);

        $this->doc->appendChild($invoices);

        return $this;
    }

    private function insert(\DOMElement $invoices, \DOMElement $element, int $index): void
    {
        $invoices->insertBefore($element, $invoices->childNodes->item($index));
    }
}
