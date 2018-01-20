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

namespace Vanvo\NavInvoiceXml\Models\Xml;

use Vanvo\NavInvoiceXml\Dto\VatSummary;

class VatSummaryXml extends Xml
{
    public function __construct(VatSummary $vatSummary)
    {
        $this->append('<afarovat>');
        $this->append("<adokulcs>{$vatSummary->getVatRate()}</adokulcs>");
        $this->append("<nettoar>{$vatSummary->getNetTotal()}</nettoar>");
        $this->append("<afaertekossz>{$vatSummary->getTaxTotal()}</afaertekossz>");
        $this->append("<bruttoarossz>{$vatSummary->getGrossTotal()}</bruttoarossz>");
        $this->append('</afarovat>');
    }
}
