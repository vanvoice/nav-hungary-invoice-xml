<?php
/**
 * Contains the VatSummaryCollection class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-19
 *
 */

namespace Konekt\NavInvoiceXml\Models;

use Konekt\NavInvoiceXml\Dto\VatSummary;

class VatSummaryCollection implements \IteratorAggregate
{
    private $items;

    public function __construct(VatSummary ...$items)
    {
        $this->items = $items;
    }

    public function getIterator()
    {
        new \ArrayIterator($this->items);
    }
}
