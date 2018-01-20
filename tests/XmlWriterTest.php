<?php
/**
 * Contains the XmlWriterTest class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-19
 *
 */

namespace Vanvo\NavInvoiceXml\Tests;

use Vanvo\NavInvoiceXml\Dto\Address;
use Vanvo\NavInvoiceXml\Dto\Person;
use Vanvo\NavInvoiceXml\Models\XmlWriter;
use PHPUnit\Framework\TestCase;

class XmlWriterTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_be_created()
    {
        $this->assertInstanceOf(XmlWriter::class, new XmlWriter());
    }

    /**
     * @test
     */
    public function it_creates_with_proper_xml_version()
    {
        $writer = new XmlWriter();
        $this->assertEquals('1.0', $writer->getVersion());

        $writer = new XmlWriter('1.1');
        $this->assertEquals('1.1', $writer->getVersion());
    }

    /**
     * @test
     */
    public function it_appends_lines_to_buffer()
    {
        $writer = new XmlWriter();

        $writer->append('Test line');

        $this->assertContains('Test line', $writer->getBuffer());
    }

    /**
     * @test
     */
    public function it_appends_the_issuer()
    {
        $writer  = new XmlWriter();
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

        $writer->addIssuer(new Person('Artkonekt', $address, 'J/1234', '22222'));

        $this->assertContains("<adoszam>J/1234</adoszam>", $writer->getBuffer());
        $this->assertContains("<nev>Artkonekt</nev>", $writer->getBuffer());
        $this->assertContains('<iranyitoszam>535500</iranyitoszam>', $writer->getBuffer());
        $this->assertContains('<telepules>Budapest</telepules>', $writer->getBuffer());
        $this->assertContains('<kerulet>V</kerulet>', $writer->getBuffer());
        $this->assertContains('<kozterulet_neve>Petofi Sandor</kozterulet_neve>', $writer->getBuffer());
        $this->assertContains('<kozterulet_jellege>lakopark</kozterulet_jellege>', $writer->getBuffer());
        $this->assertContains('<hazszam>12</hazszam>', $writer->getBuffer());
        $this->assertContains('<epulet>1</epulet>', $writer->getBuffer());
        $this->assertContains('<lepcsohaz>2</lepcsohaz>', $writer->getBuffer());
        $this->assertContains('<szint>3</szint>', $writer->getBuffer());
        $this->assertContains('<ajto>25</ajto>', $writer->getBuffer());
        $this->assertContains('<kozadoszam>22222</kozadoszam>', $writer->getBuffer());
    }

    /**
     * @test
     */
    public function it_appends_the_customer()
    {
        $writer  = new XmlWriter();
        $address = new Address(
            '12345',
            'Pecs',
            '1',
            'Ady Endre',
            'berhaz',
            '1',
            '1',
            '1',
            '1',
            '1'
        );

        $writer->addCustomer(new Person('Fantasy company', $address, '1234'));

        $this->assertContains("<adoszam>1234</adoszam>", $writer->getBuffer());
        $this->assertContains("<nev>Fantasy company</nev>", $writer->getBuffer());
        $this->assertContains('<iranyitoszam>12345</iranyitoszam>', $writer->getBuffer());
        $this->assertContains('<telepules>Pecs</telepules>', $writer->getBuffer());
        $this->assertContains('<kerulet>1</kerulet>', $writer->getBuffer());
        $this->assertContains('<kozterulet_neve>Ady Endre</kozterulet_neve>', $writer->getBuffer());
        $this->assertContains('<kozterulet_jellege>berhaz</kozterulet_jellege>', $writer->getBuffer());
        $this->assertContains('<hazszam>1</hazszam>', $writer->getBuffer());
        $this->assertContains('<epulet>1</epulet>', $writer->getBuffer());
        $this->assertContains('<lepcsohaz>1</lepcsohaz>', $writer->getBuffer());
        $this->assertContains('<szint>1</szint>', $writer->getBuffer());
        $this->assertContains('<ajto>1</ajto>', $writer->getBuffer());
    }
}
