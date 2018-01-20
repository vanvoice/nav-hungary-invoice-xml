<?php
/**
 * Contains the VatSummary class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-19
 *
 */

namespace Vanvo\NavInvoiceXml\Dto;

class VatSummary
{
    /** @var int */
    protected $vatRate;

    /** @var float */
    protected $netTotal;

    /** @var float */
    protected $taxTotal;

    /** @var float */
    protected $grossTotal;

    /**
     * VatSummary constructor.
     *
     * @param int   $vatRate
     * @param float $netTotal
     * @param float $taxTotal
     * @param float $grossTotal
     */
    public function __construct(int $vatRate, float $netTotal, float $taxTotal, float $grossTotal)
    {
        $this->vatRate    = $vatRate;
        $this->netTotal   = $netTotal;
        $this->taxTotal   = $taxTotal;
        $this->grossTotal = $grossTotal;
    }

    /**
     * @return int
     */
    public function getVatRate(): int
    {
        return $this->vatRate;
    }

    /**
     * @return float
     */
    public function getNetTotal(): float
    {
        return $this->netTotal;
    }

    /**
     * @return float
     */
    public function getTaxTotal(): float
    {
        return $this->taxTotal;
    }

    /**
     * @return float
     */
    public function getGrossTotal(): float
    {
        return $this->grossTotal;
    }
}
