<?php
/**
 * Contains the Partner class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-19
 *
 */

namespace Vanvo\NavInvoiceXml\Dto;

class Partner
{
    /** @var string */
    protected $name;

    /** @var string */
    protected $taxNumber;

    /** @var string|null */
    protected $taxNumberIntl;

    /** @var Address */
    protected $address;

    /**
     * Partner constructor.
     *
     * @param string      $name
     * @param string      $taxNumber
     * @param null|string $taxNumberIntl
     * @param Address     $address
     */
    public function __construct(string $name, string $taxNumber, ?string $taxNumberIntl, Address $address)
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
     * @return null|string
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
