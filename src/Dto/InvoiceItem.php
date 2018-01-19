<?php
/**
 * Contains the InvoiceItem class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-19
 *
 */

namespace Konekt\NavInvoiceXml\Dto;

class InvoiceItem
{
    /** @var string */
    protected $name;

    /** @var string */
    protected $statisticalCode;

    /** @var float */
    protected $quantity;

    /** @var string */
    protected $unit;

    /** @var bool */
    protected $isMediated;

    /** @var float */
    protected $unitPrice;

    /** @var float */
    protected $netTotal;

    /** @var float */
    protected $taxTotal;

    /** @var float */
    protected $grossTotal;

    /** @var int */
    protected $vatRate;

    /**
     * InvoiceItem constructor.
     *
     * @param string $name
     * @param string $statisticalCode
     * @param float  $quantity
     * @param string $unit
     * @param bool   $isMediated
     * @param float  $unitPrice
     * @param float  $netTotal
     * @param float  $taxTotal
     * @param float  $grossTotal
     * @param int    $vatRate
     */
    public function __construct(string $name, string $statisticalCode, float $quantity, string $unit, bool $isMediated, float $unitPrice, float $netTotal, float $taxTotal, float $grossTotal, int $vatRate)
    {
        $this->name            = $name;
        $this->statisticalCode = $statisticalCode;
        $this->quantity        = $quantity;
        $this->unit            = $unit;
        $this->isMediated      = $isMediated;
        $this->unitPrice       = $unitPrice;
        $this->netTotal        = $netTotal;
        $this->taxTotal        = $taxTotal;
        $this->grossTotal      = $grossTotal;
        $this->vatRate         = $vatRate;
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
    public function getStatisticalCode(): string
    {
        return $this->statisticalCode;
    }

    /**
     * @return float
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }

    /**
     * @return bool
     */
    public function isMediated(): bool
    {
        return $this->isMediated;
    }

    /**
     * @return float
     */
    public function getUnitPrice(): float
    {
        return $this->unitPrice;
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

    /**
     * @return int
     */
    public function getVatRate(): int
    {
        return $this->vatRate;
    }
}
