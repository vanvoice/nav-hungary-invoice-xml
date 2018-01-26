<?php
/**
 * Contains the AddressTest class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-19
 *
 */

namespace Konekt\NavInvoiceXml\Tests\Xml;

use PHPUnit\Framework\TestCase;
use Vanvo\NavInvoiceXml\Dto\Address;
use Vanvo\NavInvoiceXml\AddressXml;

class AddressTest extends TestCase
{
    /**
     * @test
     */
    public function it_return_the_proper_xml()
    {
        $address = new Address(
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
        );

        $xml = AddressXml::createXml($address)->getDocument()->saveXML();

        $this->assertContains('<iranyitoszam>535500</iranyitoszam>', $xml);
        $this->assertContains('<telepules>Budapest</telepules>', $xml);
        $this->assertContains('<kerulet>V</kerulet>', $xml);
        $this->assertContains('<kozterulet_neve>Petofi Sandor</kozterulet_neve>', $xml);
        $this->assertContains('<kozterulet_jellege>lakopark</kozterulet_jellege>', $xml);
        $this->assertContains('<hazszam>12</hazszam>', $xml);
        $this->assertContains('<epulet>1</epulet>', $xml);
        $this->assertContains('<lepcsohaz>2</lepcsohaz>', $xml);
        $this->assertContains('<szint>3</szint>', $xml);
        $this->assertContains('<ajto>25</ajto>', $xml);
    }
}
