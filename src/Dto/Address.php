<?php
/**
 * Contains the XmlAddress class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-19
 *
 */

namespace Vanvo\NavInvoiceXml\Dto;

class Address
{
    /** @var string */
    protected $zip;

    /** @var string */
    protected $city;

    /** @var string */
    protected $district;

    /** @var string */
    protected $address;

    /** @var string */
    protected $placeType;

    /** @var string */
    protected $houseNr;

    /** @var string */
    protected $building;

    /** @var string */
    protected $stair;

    /** @var string */
    protected $level;

    /** @var string */
    protected $door;

    /**
     * XmlAddress constructor.
     *
     * @param string $zip
     * @param string $city
     * @param string $district
     * @param string $address
     * @param string $placeType
     * @param string $houseNr
     * @param string $building
     * @param string $stair
     * @param string $level
     * @param string $door
     */
    public function __construct(string $zip, string $city, string $district, string $address, string $placeType, string $houseNr, string $building, string $stair, string $level, string $door)
    {
        $this->zip       = $zip;
        $this->city      = $city;
        $this->district  = $district;
        $this->address   = $address;
        $this->placeType = $placeType;
        $this->houseNr   = $houseNr;
        $this->building  = $building;
        $this->stair     = $stair;
        $this->level     = $level;
        $this->door      = $door;
    }

    /**
     * @return string
     */
    public function getZip(): string
    {
        return $this->zip;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getDistrict(): string
    {
        return $this->district;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getPlaceType(): string
    {
        return $this->placeType;
    }

    /**
     * @return string
     */
    public function getHouseNr(): string
    {
        return $this->houseNr;
    }

    /**
     * @return string
     */
    public function getBuilding(): string
    {
        return $this->building;
    }

    /**
     * @return string
     */
    public function getStair(): string
    {
        return $this->stair;
    }

    /**
     * @return string
     */
    public function getLevel(): string
    {
        return $this->level;
    }

    /**
     * @return string
     */
    public function getDoor(): string
    {
        return $this->door;
    }
}
