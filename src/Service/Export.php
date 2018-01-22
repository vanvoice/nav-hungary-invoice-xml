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

use Vanvo\NavInvoiceXml\Models\ExportEntryCollection;
use Vanvo\NavInvoiceXml\Models\Xml\AddressXml;
use Vanvo\NavInvoiceXml\Models\Xml\InvoiceItemXml;
use Vanvo\NavInvoiceXml\Models\Xml\InvoiceXml;
use Vanvo\NavInvoiceXml\Models\Xml\MiscXml;
use Vanvo\NavInvoiceXml\Models\Xml\PartnerXml;
use Vanvo\NavInvoiceXml\Models\Xml\PriceSummaryXml;
use Vanvo\NavInvoiceXml\Models\Xml\VatSummaryXml;
use Vanvo\NavInvoiceXml\Models\Xml\Xml;

class Export extends Xml
{
    /** @var ExportEntryCollection */
    protected $exportEntries;

    /**
     * Export constructor.
     *
     * @param ExportEntryCollection $exportEntries
     */
    public function __construct(ExportEntryCollection $exportEntries)
    {
        $this->exportEntries = $exportEntries;
    }

    public function build(): self
    {
        $this->append('<?xml version="1.0" encoding="UTF-8"?>');

        /** @var ExportEntry $entry */
        foreach ($this->exportEntries as $entry) {
            $this->append('<szamla>');

            $this->append((new InvoiceXml($entry->getInvoice()))->getXml());

            $this->append('<szamlakibocsato>');
            $this->append((new PartnerXml($entry->getIssuer()))->getXml());
            $this->append((new AddressXml($entry->getIssuerAddress()))->getXml());
            $this->append('</szamlakibocsato>');

            $this->append('<vevo>');
            $this->append((new PartnerXml($entry->getCustomer()))->getXml());
            $this->append((new AddressXml($entry->getCustomerAddress()))->getXml());
            $this->append('</vevo>');


            foreach ($entry->getInvoiceItems() as $item) {
                $this->append((new InvoiceItemXml($item))->getXml());
            }

            $this->append((new MiscXml($entry->getMisc()))->getXml());

            foreach ($entry->getVatSummaries() as $vatSummary) {
                $this->append((new VatSummaryXml($vatSummary))->getXml());
            }

            $this->append((new PriceSummaryXml($entry->getPriceSummary()))->getXml());

            $this->append('</szamla>');
        }

        $exportDate = (new \DateTime())->format('Y-m-d');
        /** @var ExportEntry $firstItem */
        $firstItem = $this->exportEntries->first();
        $lastItem  = $this->exportEntries->last();

        $this->append('<szamlak xmlns="http://schemas.nav.gov.hu/2013/szamla">');
        $this->append("<export_datuma>{$exportDate}</export_datuma>");
        $this->append("<export_szla_db>{$this->exportEntries->count()}</export_szla_db>");
        $this->append("<kezdo_ido>{$firstItem->getInvoice()->getIssuedOn()->format('Y-m-d')}</kezdo_ido>");
        $this->append("<zaro_ido>{$lastItem->getInvoice()->getIssuedOn()->format('Y-m-d')}</zaro_ido>");
        $this->append("<kezdo_szla_szam>{$firstItem->getInvoice()->getNumber()}</kezdo_szla_szam>");
        $this->append("<zaro_szla_szam>{$lastItem->getInvoice()->getNumber()}</zaro_szla_szam>");
        $this->append('</szamlak>');

        return $this;
    }
}
