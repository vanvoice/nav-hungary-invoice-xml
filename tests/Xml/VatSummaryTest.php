<?php
/**
 * Contains the VatSummaryTest class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-20
 *
 */

namespace Vanvo\NavInvoiceXml\Tests\Xml;

use PHPUnit\Framework\TestCase;
use Vanvo\NavInvoiceXml\Dto\VatSummary;
use Vanvo\NavInvoiceXml\Models\Xml\VatSummaryXml;

class VatSummaryTest extends TestCase
{
    /**
     * @test
     */
    public function it_return_the_proper_xml()
    {
        $vatSummary = new VatSummary(
            2,
            12,
            14.5,
            11.22
        );

        $xml = new VatSummaryXml($vatSummary);

        $this->assertContains('<adokulcs>2</adokulcs>', $xml->getXml());
        $this->assertContains('<nettoar>12</nettoar>', $xml->getXml());
        $this->assertContains('<afaertekossz>14.5</afaertekossz>', $xml->getXml());
        $this->assertContains('<bruttoarossz>11.22</bruttoarossz>', $xml->getXml());
    }
}
