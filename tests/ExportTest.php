<?php
/**
 * Contains the ExportTest class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-22
 *
 */

namespace Vanvo\NavInvoiceXml\Tests;

use PHPUnit\Framework\TestCase;
use Vanvo\NavInvoiceXml\Dto\Address;
use Vanvo\NavInvoiceXml\Dto\Invoice;
use Vanvo\NavInvoiceXml\Dto\InvoiceItem;
use Vanvo\NavInvoiceXml\Dto\InvoiceType;
use Vanvo\NavInvoiceXml\Dto\Misc;
use Vanvo\NavInvoiceXml\Dto\Partner;
use Vanvo\NavInvoiceXml\Dto\PriceSummary;
use Vanvo\NavInvoiceXml\Dto\VatSummary;
use Vanvo\NavInvoiceXml\Models\ExportEntryCollection;
use Vanvo\NavInvoiceXml\Models\InvoiceItemCollection;
use Vanvo\NavInvoiceXml\Models\VatSummaryCollection;
use Vanvo\NavInvoiceXml\Service\Export;
use Vanvo\NavInvoiceXml\Service\ExportEntry;

class ExportTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_export_the_xml()
    {
        $date    = new \DateTime();
        $invoice = new Invoice('12345', InvoiceType::INVOICE(), $date, $date);

        $issuer        = new Partner('Test Elek', 'HU999');
        $issuerAddress = new Address(
            '535500',
            'Budapest',
            'V',
            'Petofi Sandor',
            'lakopark',
            '12',
            '1',
            '2',
            '3',
            '25'
        );


        $customer        = new Partner('Vanvo', '8888');
        $customerAddress = new Address(
            '22340',
            'Pecs',
            '2',
            'Ady Endre',
            'negyed',
            '1',
            '41',
            '5',
            '7',
            '225'
        );

        $itemOne = new InvoiceItem(
            'Kakaos csiga',
            '25',
            1.5,
            'kg',
            false,
            13,
            19.5,
            0.97,
            20.475,
            5
        );

        $itemTwo = new InvoiceItem(
            'Dios csiga',
            '25',
            1.5,
            'kg',
            false,
            11,
            12.5,
            0.85,
            15.475,
            2
        );

        $vatSummaryOne = new VatSummary(
            22,
            15,
            1.5,
            16.5
        );

        $vatSummaryTwo = new VatSummary(
            24,
            2,
            1.5,
            13.45
        );

        $entry = new ExportEntry(
            $invoice,
            $issuer,
            $issuerAddress,
            $customer,
            $customerAddress,
            new InvoiceItemCollection($itemOne, $itemTwo),
            new Misc(new \DateTime(), 'cash', null, 'HUF12345'),
            new VatSummaryCollection($vatSummaryOne, $vatSummaryTwo),
            new PriceSummary(13, 10.27, 23.27)
        );

        $export = new Export(new ExportEntryCollection($entry, $entry));
        $export->build();

        $this->assertInternalType('string', $export->getXml());

        $this->assertContains('<adokulcs>24</adokulcs>', $export->getXml());
        $this->assertContains('<adokulcs>22</adokulcs>', $export->getXml());
        $this->assertContains("<export_szla_db>2</export_szla_db>", $export->getXml());
        $this->assertContains("<kezdo_ido>{$date->format('Y-m-d')}</kezdo_ido>", $export->getXml());
        $this->assertContains("<zaro_ido>{$date->format('Y-m-d')}</zaro_ido>", $export->getXml());
        $this->assertContains("<kezdo_szla_szam>12345</kezdo_szla_szam>", $export->getXml());
        $this->assertContains("<zaro_szla_szam>12345</zaro_szla_szam>", $export->getXml());
    }
}
