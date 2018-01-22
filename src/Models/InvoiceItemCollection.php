<?php
/**
 * Contains the InvoiceItemCollection class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-19
 *
 */

namespace Vanvo\NavInvoiceXml\Models;

use Vanvo\NavInvoiceXml\Dto\InvoiceItem;

class InvoiceItemCollection extends Collection
{
    public function __construct(InvoiceItem ...$items)
    {
        $this->items = $items;
    }
}
