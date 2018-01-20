<?php
/**
 * Contains the Xml class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-19
 *
 */

namespace Vanvo\NavInvoiceXml\Models\Xml;

abstract class Xml
{
    /** @var string */
    private $xml = '';

    public function append(string $line)
    {
        $this->xml .= $line;

        return $this;
    }

    public function getXml(): string
    {
        return $this->xml;
    }
}
