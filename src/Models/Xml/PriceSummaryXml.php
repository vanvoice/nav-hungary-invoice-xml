<?php
/**
 * Contains the PriceSummaryXml class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-20
 *
 */

namespace Vanvo\NavInvoiceXml\Models\Xml;

use Vanvo\NavInvoiceXml\Dto\PriceSummary;

class PriceSummaryXml extends Xml
{
    public function __construct(PriceSummary $priceSummary)
    {
        $this->append('<vegosszeg>');
        $this->append("<nettoar>{$priceSummary->getNetTotal()}</nettoar>");
        $this->append("<afaertekossz>{$priceSummary->getTaxTotal()}</afaertekossz>");
        $this->append("<bruttoarossz>{$priceSummary->getGrossTotal()}</bruttoarossz>");
        $this->append('</vegosszeg>');
    }
}
