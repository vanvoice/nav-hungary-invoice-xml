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
use Vanvo\NavInvoiceXml\Dto\Invoice;
use Vanvo\NavInvoiceXml\Dto\InvoiceType;
use Vanvo\NavInvoiceXml\Models\Xml\InvoiceXml;

class InvoiceTest extends TestCase
{
    /**
     * @test
     */
    public function it_return_the_proper_xml()
    {
        $invoice = new Invoice(
            '12345/HU',
            InvoiceType::INVOICE(),
            \DateTime::createFromFormat('Y-m-d', '2018-02-02'),
            \DateTime::createFromFormat('Y-m-d', '2018-12-26')
        );

        $xml = new InvoiceXml($invoice);

        $this->assertContains('<szlasorszam>12345/HU</szlasorszam>', $xml->getXml());
        $this->assertContains('<szlatipus>1</szlatipus>', $xml->getXml());
        $this->assertContains('<szladatum>2018-02-02</szladatum>', $xml->getXml());
        $this->assertContains('<teljdatum>2018-12-26</teljdatum>', $xml->getXml());
    }
}
