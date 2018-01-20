<?php
/**
 * Contains the Exporter class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-19
 *
 */

namespace Vanvo\NavInvoiceXml\Services;

use Vanvo\NavInvoiceXml\Models\AbstractWriter;

class Exporter
{
    /** @var AbstractWriter */
    protected $writer;

    /**
     * Exporter constructor.
     *
     * @param AbstractWriter $writer
     */
    public function __construct(AbstractWriter $writer)
    {
        $this->writer = $writer;
    }

    public function export()
    {
    }
}
