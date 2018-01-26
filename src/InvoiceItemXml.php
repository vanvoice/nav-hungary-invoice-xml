<?php
/**
 * Contains the InvoiceItemXml class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-20
 *
 */

namespace Vanvo\NavInvoiceXml;

use Vanvo\NavInvoiceXml\Dto\InvoiceItem;

class InvoiceItemXml extends Xml
{
    public function __construct(InvoiceItem $invoiceItem)
    {
        parent::__construct();

        $this->createRoot('termek_szolgaltatas_tetelek');

        $this->add('termeknev', $invoiceItem->getName());
        $this->add('besorszam', $invoiceItem->getStatisticalCode());

        $this->add('menny', round($invoiceItem->getQuantity(), 2));
        $this->add('mertekegys', $invoiceItem->getUnit());

        if ($invoiceItem->isMediated()) {
            $this->add('kozv_szolgaltatas', true);
        }

        $this->add('nettoar', round($invoiceItem->getNetTotal(), 2));
        $this->add('nettoegysar', round($invoiceItem->getUnitPrice(), 2));
        $this->add('adokulcs', $invoiceItem->getVatRate());
        $this->add('adoertek', round($invoiceItem->getTaxTotal(), 2));
        $this->add('bruttoar', round($invoiceItem->getGrossTotal(), 2));
    }
}
