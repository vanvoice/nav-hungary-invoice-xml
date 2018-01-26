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

namespace Vanvo\NavInvoiceXml;

use Vanvo\NavInvoiceXml\Dto\PriceSummary;

class PriceSummaryXml extends Xml
{
    public function __construct(PriceSummary $priceSummary)
    {
        parent::__construct();

        $this->createRoot('vegosszeg');

        $this->add('nettoarossz', round($priceSummary->getNetTotal(), 2));
        $this->add('afaertekossz', round($priceSummary->getTaxTotal(), 2));
        $this->add('bruttoarossz', round($priceSummary->getGrossTotal(), 2));
    }
}
