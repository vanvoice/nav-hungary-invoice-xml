<?php

/**
 * Contains the AddressDtoTest class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-19
 *
 */

namespace Konekt\NavInvoiceXml\Tests;

use Konekt\NavInvoiceXml\Dto\Address;
use PHPUnit\Framework\TestCase;

class AddressDtoTest extends TestCase
{
    /** @var Address */
    private $address;

    /**
     * @test
     */
    public function it_can_be_created()
    {
        $this->assertInstanceOf(Address::class, $this->address);
    }

    /**
     * @test
     */
    public function it_has_all_necessary_fields()
    {
        $this->assertObjectHasAttribute('zip', $this->address);
        $this->assertObjectHasAttribute('city', $this->address);
        $this->assertObjectHasAttribute('district', $this->address);
        $this->assertObjectHasAttribute('address', $this->address);
        $this->assertObjectHasAttribute('placeType', $this->address);
        $this->assertObjectHasAttribute('houseNr', $this->address);
        $this->assertObjectHasAttribute('building', $this->address);
        $this->assertObjectHasAttribute('stair', $this->address);
        $this->assertObjectHasAttribute('level', $this->address);
        $this->assertObjectHasAttribute('door', $this->address);
    }

    /**
     * @test
     */
    public function it_returns_the_proper_types()
    {
        $this->assertInternalType('string', $this->address->getZip());
        $this->assertInternalType('string', $this->address->getCity());
        $this->assertInternalType('string', $this->address->getDistrict());
        $this->assertInternalType('string', $this->address->getAddress());
        $this->assertInternalType('string', $this->address->getPlaceType());
        $this->assertInternalType('string', $this->address->getHouseNr());
        $this->assertInternalType('string', $this->address->getBuilding());
        $this->assertInternalType('string', $this->address->getStair());
        $this->assertInternalType('string', $this->address->getLevel());
        $this->assertInternalType('string', $this->address->getDoor());
    }

    protected function setUp()
    {
        $this->address = new Address(
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
    }
}