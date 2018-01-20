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

class VatSummary extends PriceSummary
{
    /** @var int */
    protected $vatRate;

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
        parent::__construct($netTotal, $taxTotal, $grossTotal);

        $this->vatRate = $vatRate;
    }

    /**
     * @return int
     */
    public function getVatRate(): int
    {
        return $this->vatRate;
    }
}
