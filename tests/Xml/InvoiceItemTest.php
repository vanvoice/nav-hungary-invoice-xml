<?php
/**
 * Contains the InvoiceItemTest class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-20
 *
 */

namespace Konekt\NavInvoiceXml\Tests\Xml;

use PHPUnit\Framework\TestCase;
use Vanvo\NavInvoiceXml\Dto\InvoiceItem;
use Vanvo\NavInvoiceXml\InvoiceItemXml;

class InvoiceItemTest extends TestCase
{
    /**
     * @test
     */
    public function it_return_the_proper_xml()
    {
        $invoiceItem = new InvoiceItem(
            'Palacsinta',
            '2',
            5.5,
            'l',
            false,
            1.2,
            8,
            2.2,
            12.445,
            2
        );

        $xml = InvoiceItemXml::createXml($invoiceItem)->getDocument()->saveXML();

        $this->assertContains('<termeknev>Palacsinta</termeknev>', $xml);
        $this->assertContains('<besorszam>2</besorszam>', $xml);
        $this->assertContains('<menny>5.5</menny>', $xml);
        $this->assertContains('<mertekegys>l</mertekegys>', $xml);
        $this->assertContains('<nettoegysar>1.2</nettoegysar>', $xml);
        $this->assertContains('<nettoar>8</nettoar>', $xml);
        $this->assertContains('<bruttoar>12.45</bruttoar>', $xml);
        $this->assertContains('<adoertek>2.2</adoertek>', $xml);
        $this->assertContains('<adokulcs>2</adokulcs>', $xml);
    }
}
