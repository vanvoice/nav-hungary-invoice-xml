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

namespace Vanvo\NavInvoiceXml\Models;

use Vanvo\NavInvoiceXml\Dto\VatSummary;

class VatSummaryCollection extends Collection
{
    public function __construct(VatSummary ...$items)
    {
        $this->items = $items;
    }
}
