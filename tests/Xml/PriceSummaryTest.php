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
use Vanvo\NavInvoiceXml\Models\Xml\PriceSummaryXml;

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

        $xml = new PriceSummaryXml($priceSummary);

        $this->assertContains('<nettoar>12</nettoar>', $xml->getXml());
        $this->assertContains('<afaertekossz>14.5</afaertekossz>', $xml->getXml());
        $this->assertContains('<bruttoarossz>11.22</bruttoarossz>', $xml->getXml());
    }
}
