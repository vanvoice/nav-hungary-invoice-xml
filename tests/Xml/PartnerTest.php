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
use Vanvo\NavInvoiceXml\Dto\Address;
use Vanvo\NavInvoiceXml\Dto\Partner;
use Vanvo\NavInvoiceXml\PartnerXml;

class PartnerTest extends TestCase
{
    /**
     * @test
     */
    public function it_return_the_proper_xml()
    {
        $address = new Address(
            '1',
            '1',
            '1',
            '1',
            '1',
            '1',
            '1',
            '1',
            '1',
            '1'
        );

        $partner = new Partner(
            'Test Elek',
            '1113',
            null,
            $address
        );

        $xml = PartnerXml::createXml($partner)->getDocument()->saveXML();

        $this->assertContains('<adoszam xmlns="http://schemas.nav.gov.hu/2013/szamla">1113</adoszam>', $xml);
        $this->assertContains('<nev xmlns="http://schemas.nav.gov.hu/2013/szamla">Test Elek</nev>', $xml);
    }
}
