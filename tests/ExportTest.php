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
use Vanvo\NavInvoiceXml\InvoiceCollection;
use Vanvo\NavInvoiceXml\InvoiceItemCollection;
use Vanvo\NavInvoiceXml\VatSummaryCollection;
use Vanvo\NavInvoiceXml\Service\Export;

class ExportTest extends TestCase
{
    private $invoice;

    protected function setUp()
    {
        $issuer = new Partner(
            'Test Elek',
            '123456789',
            null,
            new Address(
                '11111',
                'Siofok',
                '1',
                'Uj utca',
                'negyed',
                '1',
                '1',
                '2',
                '1',
                '1'
            )
        );

        $customer = new Partner(
            'Artkonekt',
            'J/1234252222',
            null,
            new Address(
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
            )
        );

        $invoiceItem = new InvoiceItem(
            'Kakaos csiga',
            '25',
            1.5,
            'kg',
            false,
            13,
            19.5,
            0.97,
            //TODO: if there are more decimals then 2 this is invalid based on xsd
            20.47,
            5
        );

        $vatSummary = new VatSummary(
            10,
            15,
            1.5,
            16.5
        );

        $this->invoice = new Invoice(
            '1234',
            InvoiceType::INVOICE(),
            new \DateTime(),
            new \DateTime(),
            $issuer,
            $customer,
            new InvoiceItemCollection($invoiceItem, $invoiceItem),
            new VatSummaryCollection($vatSummary, $vatSummary),
            new PriceSummary(13, 10.27, 23.27),
            new Misc(new \DateTime(), 'cash', null, 'HUF12345')
        );
    }

    /**
     * @test
     */
    public function it_exports_the_properly_structured_xml()
    {
        $export = new Export(new InvoiceCollection($this->invoice, $this->invoice));
        $export = $export->build();

        $this->assertTrue($export->getDocument()->schemaValidate(__DIR__ . '/Schema/23_2014_szamlasema.xsd'));
    }
}
