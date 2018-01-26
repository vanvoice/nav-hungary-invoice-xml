<?php
/**
 * Contains the InvoiceTest class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-20
 *
 */

namespace Konekt\NavInvoiceXml\Tests\Xml;

use PHPUnit\Framework\TestCase;
use Vanvo\NavInvoiceXml\Dto\Address;
use Vanvo\NavInvoiceXml\Dto\Invoice;
use Vanvo\NavInvoiceXml\Dto\InvoiceItem;
use Vanvo\NavInvoiceXml\Dto\InvoiceType;
use Vanvo\NavInvoiceXml\Dto\Misc;
use Vanvo\NavInvoiceXml\Dto\Partner;
use Vanvo\NavInvoiceXml\Dto\PriceSummary;
use Vanvo\NavInvoiceXml\Dto\VatSummary;
use Vanvo\NavInvoiceXml\InvoiceItemCollection;
use Vanvo\NavInvoiceXml\VatSummaryCollection;
use Vanvo\NavInvoiceXml\InvoiceXml;

class InvoiceTest extends TestCase
{
    /**
     * @test
     */
    public function it_return_the_proper_xml()
    {
        $issuer = new Partner(
            'Test Elek',
            'JH1234',
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
            'J/1234',
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
            20.475,
            5
        );

        $vatSummary = new VatSummary(
            10,
            15,
            1.5,
            16.5
        );

        $invoice = new Invoice(
            '12345/HU',
            InvoiceType::INVOICE(),
            \DateTime::createFromFormat('Y-m-d', '2018-02-02'),
            \DateTime::createFromFormat('Y-m-d', '2018-12-26'),
            $issuer,
            $customer,
            new InvoiceItemCollection($invoiceItem, $invoiceItem),
            new VatSummaryCollection($vatSummary, $vatSummary),
            new PriceSummary(13,10.27,23.27),
            new Misc(new \DateTime(),'cash',null,'HUF12345')
        );

        $xml = InvoiceXml::createXml($invoice)->getDocument()->saveXML();

        $this->assertContains('<szlasorszam>12345/HU</szlasorszam>', $xml);
        $this->assertContains('<szlatipus>1</szlatipus>', $xml);
        $this->assertContains('<szladatum>2018-02-02</szladatum>', $xml);
        $this->assertContains('<teljdatum>2018-12-26</teljdatum>', $xml);
    }
}
