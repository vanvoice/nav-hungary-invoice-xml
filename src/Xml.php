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

namespace Vanvo\NavInvoiceXml;

abstract class Xml
{
    /** @var \DOMDocument */
    protected $doc;

    /** @var \DOMElement */
    protected $root;

    /** @var string */
    protected $nameSpace = 'http://schemas.nav.gov.hu/2013/szamla';

    public function __construct()
    {
        $this->doc               = new \DOMDocument();
        $this->doc->encoding     = 'UTF-8';
        $this->doc->formatOutput = true;
    }

    public static function createXml($dto)
    {
        return new static($dto);
    }

    public function add(string $nodeName, ?string $value): void
    {
        $elem = $this->createElement($nodeName, $value);

        $this->root ? $this->root->appendChild($elem) : $this->doc->appendChild($elem);
    }

    protected function createRoot($name): void
    {
        $this->root = $this->doc->appendChild($this->createElement($name));
    }

    protected function createElement(string $nodeName, string $value = ''): \DOMElement
    {
        return $this->doc->createElementNS($this->nameSpace, $nodeName, $value);
    }

    public function getDocument(): \DOMDocument
    {
        return $this->doc;
    }

    public function merge(\DOMElement $to, self $xml)
    {
        foreach ($xml->getDocument()->childNodes as $node) {
            $to->appendChild($this->doc->importNode($node, true));
        }
    }
}
