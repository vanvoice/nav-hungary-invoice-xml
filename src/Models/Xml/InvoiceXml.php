<?php
/**
 * Contains the InvoiceXml class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-20
 *
 */

namespace Vanvo\NavInvoiceXml\Models\Xml;

use Vanvo\NavInvoiceXml\Dto\Invoice;

class InvoiceXml extends Xml
{
    public function __construct(Invoice $invoice)
    {
        $this->append('<fejlec>');
        $this->append("<szlasorszam>{$invoice->getNumber()}</szlasorszam>");
        $this->append("<szlatipus>{$invoice->getType()->value()}</szlatipus>");
        $this->append("<szladatum>{$invoice->getIssuedOn()->format('Y-m-d')}</szladatum>");
        $this->append("<teljdatum>{$invoice->getFulfillmentOn()->format('Y-m-d')}</teljdatum>");
        $this->append("</fejlec>");
    }
}
