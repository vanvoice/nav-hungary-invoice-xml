<?php
/**
 * Contains the PriceSummaryTest class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-20
 *
 */

namespace Vanvo\NavInvoiceXml\Tests\Xml;

use PHPUnit\Framework\TestCase;
use Vanvo\NavInvoiceXml\Dto\PriceSummary;
use Vanvo\NavInvoiceXml\PriceSummaryXml;

class PriceSummaryTest extends TestCase
{
    /**
     * @test
     */
    public function it_return_the_proper_xml()
    {
        $priceSummary = new PriceSummary(
            12,
            14.5,
            11.22
        );

        $xml = PriceSummaryXml::createXml($priceSummary)->getDocument()->saveXML();

        $this->assertContains('<nettoarossz>12</nettoarossz>', $xml);
        $this->assertContains('<afaertekossz>14.5</afaertekossz>', $xml);
        $this->assertContains('<bruttoarossz>11.22</bruttoarossz>', $xml);
    }
}
