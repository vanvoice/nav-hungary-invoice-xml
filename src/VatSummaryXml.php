<?php
/**
 * Contains the VatSummaryXml class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-20
 *
 */

namespace Vanvo\NavInvoiceXml;

use Vanvo\NavInvoiceXml\Dto\VatSummary;

class VatSummaryXml extends Xml
{
    public function __construct(VatSummary $vatSummary)
    {
        parent::__construct();

        $this->createRoot('afarovat');

        $this->add('nettoar', round($vatSummary->getNetTotal(), 2));
        $this->add('adokulcs', round($vatSummary->getVatRate(), 2));
        $this->add('adoertek', round($vatSummary->getTaxTotal(), 2));
        $this->add('bruttoar', round($vatSummary->getGrossTotal(), 2));
    }
}
