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

namespace Konekt\NavInvoiceXml\Models;

use Konekt\NavInvoiceXml\Dto\InvoiceItem;

class InvoiceItemCollection implements \IteratorAggregate
{
    private $items;

    public function __construct(InvoiceItem ...$items)
    {
        $this->items = $items;
    }

    public function getIterator()
    {
        new \ArrayIterator($this->items);
    }
}
