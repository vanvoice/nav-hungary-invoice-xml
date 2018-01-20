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
use Vanvo\NavInvoiceXml\Models\Xml\AddressXml;

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

        $xml = new AddressXml($address);

        $this->assertContains('<iranyitoszam>535500</iranyitoszam>', $xml->getXml());
        $this->assertContains('<telepules>Budapest</telepules>', $xml->getXml());
        $this->assertContains('<kerulet>V</kerulet>', $xml->getXml());
        $this->assertContains('<kozterulet_neve>Petofi Sandor</kozterulet_neve>', $xml->getXml());
        $this->assertContains('<kozterulet_jellege>lakopark</kozterulet_jellege>', $xml->getXml());
        $this->assertContains('<hazszam>12</hazszam>', $xml->getXml());
        $this->assertContains('<epulet>1</epulet>', $xml->getXml());
        $this->assertContains('<lepcsohaz>2</lepcsohaz>', $xml->getXml());
        $this->assertContains('<szint>3</szint>', $xml->getXml());
        $this->assertContains('<ajto>25</ajto>', $xml->getXml());
    }
}
