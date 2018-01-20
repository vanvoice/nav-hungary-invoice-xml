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

namespace Vanvo\NavInvoiceXml\Models\Xml;

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
        $this->append('<cim>');
        $this->append("<iranyitoszam>{$address->getZip()}</iranyitoszam>");
        $this->append("<telepules>{$address->getCity()}</telepules>");
        $this->append("<kerulet>{$address->getDistrict()}</kerulet>");
        $this->append("<kozterulet_neve>{$address->getAddress()}</kozterulet_neve>");
        $this->append("<kozterulet_jellege>{$address->getPlaceType()}</kozterulet_jellege>");
        $this->append("<hazszam>{$address->getHouseNr()}</hazszam>");
        $this->append("<epulet>{$address->getBuilding()}</epulet>");
        $this->append("<lepcsohaz>{$address->getStair()}</lepcsohaz>");
        $this->append("<szint>{$address->getLevel()}</szint>");
        $this->append("<ajto>{$address->getDoor()}</ajto>");
        $this->append('</cim>');
    }
}
