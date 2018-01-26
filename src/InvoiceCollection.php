<?php
/**
 * Contains the InvoiceCollection class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-23
 *
 */

namespace Vanvo\NavInvoiceXml;

use Vanvo\NavInvoiceXml\Dto\Invoice;

class InvoiceCollection extends Collection
{
    public function __construct(Invoice ...$invoices)
    {
        $this->items = $invoices;
    }
}
