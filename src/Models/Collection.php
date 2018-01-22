<?php
/**
 * Contains the Collection class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-22
 *
 */

namespace Vanvo\NavInvoiceXml\Models;

class Collection implements \IteratorAggregate
{
    protected $items;

    public function __construct(...$items)
    {
        $this->items = $items;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }

    public function count()
    {
        return count($this->items);
    }

    public function first()
    {
        if (empty($this->items)) {
            return null;
        }

        foreach ($this->items as $item) {
            return $item;
        }
    }

    public function last()
    {
        return empty($this->items) ? null : end($this->items);
    }
}
