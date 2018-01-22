<?php
/**
 * Contains the ExportEntryCollection class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-22
 *
 */

namespace Vanvo\NavInvoiceXml\Models;

use Vanvo\NavInvoiceXml\Service\ExportEntry;

class ExportEntryCollection extends Collection
{
    public function __construct(ExportEntry ...$items)
    {
        $this->items = $items;
    }
}
