<?php
/**
 * Contains the Partner class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-19
 *
 */

namespace Vanvo\NavInvoiceXml\Dto;

class Partner
{
    /** @var string */
    protected $name;

    /** @var string */
    protected $taxNumber;

    /** @var string */
    protected $taxNumberIntl;

    /**
     * Partner constructor.
     *
     * @param string $name
     * @param string $taxNumber
     * @param string $taxNumberIntl
     */
    public function __construct(string $name, string $taxNumber, string $taxNumberIntl = null)
    {
        $this->name          = $name;
        $this->taxNumber     = $taxNumber;
        $this->taxNumberIntl = $taxNumberIntl;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getTaxNumber(): string
    {
        return $this->taxNumber;
    }

    /**
     * @return string
     */
    public function getTaxNumberIntl(): ?string
    {
        return $this->taxNumberIntl;
    }
}
