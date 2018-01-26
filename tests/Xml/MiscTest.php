<?php
/**
 * Contains the MiscTest class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-20
 *
 */

namespace Vanvo\NavInvoiceXml\Tests\Xml;

use PHPUnit\Framework\TestCase;
use Vanvo\NavInvoiceXml\Dto\Misc;
use Vanvo\NavInvoiceXml\MiscXml;

class MiscTest extends TestCase
{

    /**
     * @test
     */
    public function it_return_the_proper_xml()
    {
        $misc = new Misc(
            \DateTime::createFromFormat('Y-m-d', '2018-04-14'),
            null,
            null,
            '123435IBAN'
        );

        $xml = MiscXml::createXml($misc)->getDocument()->saveXML();

        $this->assertContains('<fiz_hatarido>2018-04-14</fiz_hatarido>', $xml);
        $this->assertContains('<befogado_bankszla>123435IBAN</befogado_bankszla>', $xml);
    }
}
