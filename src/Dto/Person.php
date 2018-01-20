<?php
/**
 * Contains the Person class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-19
 *
 */

namespace Vanvo\NavInvoiceXml\Dto;

class Person
{
    /** @var string */
    protected $name;

    /** @var string */
    protected $taxNumber;

    /** @var string */
    protected $taxNumberIntl;

    /** @var Address */
    protected $address;

    /**
     * Person constructor.
     *
     * @param string  $name
     * @param string  $taxNumber
     * @param string  $taxNumberIntl
     * @param Address $address
     */
    public function __construct(string $name, Address $address, string $taxNumber, string $taxNumberIntl = null)
    {
        $this->name          = $name;
        $this->taxNumber     = $taxNumber;
        $this->taxNumberIntl = $taxNumberIntl;
        $this->address       = $address;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getTaxNumber(): string
    {
        return $this->taxNumber;
    }

    /**
     * @return string
     */
    public function getTaxNumberIntl(): ?string
    {
        return $this->taxNumberIntl;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }
}
