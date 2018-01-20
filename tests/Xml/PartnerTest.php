<?php
/**
 * Contains the PartnerTest class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-20
 *
 */

namespace Vanvo\NavInvoiceXml\Tests\Xml;

use PHPUnit\Framework\TestCase;
use Vanvo\NavInvoiceXml\Dto\Partner;
use Vanvo\NavInvoiceXml\Models\Xml\PartnerXml;

class PartnerTest extends TestCase
{
    /**
     * @test
     */
    public function it_return_the_proper_xml()
    {
        $partner = new Partner(
            'Test Elek',
            '1113',
            null
        );

        $xml = new PartnerXml($partner);

        $this->assertContains('<adoszam>1113</adoszam>', $xml->getXml());
        $this->assertContains('<kozadoszam></kozadoszam>', $xml->getXml());
        $this->assertContains('<nev>Test Elek</nev>', $xml->getXml());
    }
}
