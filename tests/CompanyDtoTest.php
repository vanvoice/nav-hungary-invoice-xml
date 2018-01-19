<?php

/**
 * Contains the CompanyDtoTest class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-19
 *
 */

namespace Konekt\NavInvoiceXml\Tests;

use Konekt\NavInvoiceXml\Dto\Address;
use Konekt\NavInvoiceXml\Dto\Person;
use PHPUnit\Framework\TestCase;

class CompanyDtoTest extends TestCase
{
    /** @var Person */
    private $company;

    /**
     * @test
     */
    public function it_can_be_created()
    {
        $this->assertInstanceOf(Person::class, $this->company);
    }

    /**
     * @test
     */
    public function it_has_all_necessary_fields()
    {
        $this->assertObjectHasAttribute('name', $this->company);
        $this->assertObjectHasAttribute('address', $this->company);
        $this->assertObjectHasAttribute('taxNumber', $this->company);
        $this->assertObjectHasAttribute('taxNumberIntl', $this->company);
    }

    /**
     * @test
     */
    public function it_returns_the_proper_types()
    {
        $this->assertInternalType('string', $this->company->getName());
        $this->assertInternalType('string', $this->company->getTaxNumber());
        $this->assertTrue(is_string($this->company->getTaxNumberIntl()) || is_null($this->company->getTaxNumberIntl()));
        $this->assertInstanceOf(Address::class, $this->company->getAddress());
    }

    protected function setUp()
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

        $this->company = new Person(
            'Artkonekt',
            $address,
            'J/1234'
        );
    }
}