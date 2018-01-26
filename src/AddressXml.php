<?php
/**
 * Contains the AddressXml class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-19
 *
 */

namespace Vanvo\NavInvoiceXml;

use Vanvo\NavInvoiceXml\Dto\Address;

class AddressXml extends Xml
{
    /**
     * AddressXml constructor.
     *
     * @param Address $address
     */
    public function __construct(Address $address)
    {
        parent::__construct();

        $this->createRoot('cim');

        $this->add('iranyitoszam', $address->getZip());
        $this->add('telepules', $address->getCity());
        $this->add('kerulet', $address->getDistrict());
        $this->add('kozterulet_neve', $address->getAddress());
        $this->add('kozterulet_jellege', $address->getPlaceType());
        $this->add('hazszam', $address->getHouseNr());
        $this->add('epulet', $address->getBuilding());
        $this->add('lepcsohaz', $address->getStair());
        $this->add('szint', $address->getLevel());
        $this->add('ajto', $address->getDoor());
    }
}
