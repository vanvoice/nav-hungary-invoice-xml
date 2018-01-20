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

namespace Vanvo\NavInvoiceXml\Models\Xml;

use Vanvo\NavInvoiceXml\Dto\InvoiceItem;

class InvoiceItemXml extends Xml
{
    public function __construct(InvoiceItem $invoiceItem)
    {
        $this->append("<termek_szolgaltatas_tetelek>");
        $this->append("<termeknev>{$invoiceItem->getName()}</termeknev>");
        $this->append("<besorszam>{$invoiceItem->getStatisticalCode()}</besorszam>");
        //TODO: FormatFloat('0.##', Items[i].Qty, fmt)??
        $this->append("<menny>{$invoiceItem->getQuantity()}</menny>");
        $this->append("<mertekegys>{$invoiceItem->getUnit()}</mertekegys>");

        if ($invoiceItem->isMediated()) {
            $this->append("<kozv_szolgaltatas>true</kozv_szolgaltatas>");
        }

        $this->append("<nettoar>{$invoiceItem->getNetTotal()}</nettoar>");
        $this->append("<nettoegysar>{$invoiceItem->getUnitPrice()}</nettoegysar>");
        $this->append("<bruttoar>{$invoiceItem->getGrossTotal()}</bruttoar>");
        $this->append("<adoertek>{$invoiceItem->getTaxTotal()}</adoertek>");
        $this->append("<adokulcs>{$invoiceItem->getVatRate()}</adokulcs>");
        $this->append('</termek_szolgaltatas_tetelek>');
    }
}
