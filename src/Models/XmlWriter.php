<?php
/**
 * Contains the XmlWriter class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-19
 *
 */

namespace Konekt\NavInvoiceXml\Models;

use Konekt\NavInvoiceXml\Dto\Address;
use Konekt\NavInvoiceXml\Dto\Invoice;
use Konekt\NavInvoiceXml\Dto\Person;

class XmlWriter extends AbstractWriter
{
    public function __construct($version = '1.0')
    {
        $this->version = $version;
        $this->append(sprintf('<?xml version="%s" encoding="UTF-8"?>', $this->version));
    }

    public function addIssuer(Person $issuer): AbstractWriter
    {
        $this->append('<szamlakibocsato>');
        $this->append("<adoszam>{$issuer->getTaxNumber()}</adoszam>");
        $this->append("<nev>{$issuer->getName()}</nev>");

        if ($issuer->getTaxNumberIntl()) {
            $this->append("<kozadoszam>{$issuer->getTaxNumberIntl()}</kozadoszam>");
        }

        $this->addAddress($issuer->getAddress());

        $this->append('</szamlakibocsato>');

        return $this;
    }

    private function addAddress(Address $address)
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
        $this->append("</cim>");
    }

    public function addCustomer(Person $customer): AbstractWriter
    {
        $this->append('<vevo>');
        $this->append("<adoszam>{$customer->getTaxNumber()}</adoszam>");
        $this->append("<nev>{$customer->getName()}</nev>");

        if ($customer->getTaxNumberIntl()) {
            $this->append("<kozadoszam>{$customer->getTaxNumberIntl()}</kozadoszam>");
        }

        $this->addAddress($customer->getAddress());

        $this->append('</vevo>');

        return $this;
    }

    public function addInvoice(Invoice $invoice): AbstractWriter
    {
        return $this;
    }
}
