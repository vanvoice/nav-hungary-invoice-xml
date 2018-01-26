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

namespace Vanvo\NavInvoiceXml;

use Vanvo\NavInvoiceXml\Dto\Invoice;

class InvoiceXml extends Xml
{
    public function __construct(Invoice $invoice)
    {
        parent::__construct();

        $this->createRoot('fejlec');

        $this->add('szlasorszam', $invoice->getNumber());
        $this->add('szlatipus', $invoice->getType()->value());
        $this->add('szladatum', $invoice->getIssuedOn()->format('Y-m-d'));
        $this->add('teljdatum', $invoice->getFulfillmentOn()->format('Y-m-d'));
    }
}
