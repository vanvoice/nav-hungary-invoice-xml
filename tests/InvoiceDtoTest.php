<?php
/**
 * Contains the InvoiceDtoTest class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2018-01-19
 *
 */


namespace Konekt\NavInvoiceXml\Tests;


use DateTime;
use Konekt\NavInvoiceXml\Dto\Invoice;
use Konekt\NavInvoiceXml\Dto\InvoiceType;
use PHPUnit\Framework\TestCase;

class InvoiceDtoTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_be_created()
    {
        $invoice = new Invoice();

        $this->assertInstanceOf(Invoice::class, $invoice);
    }

    /**
     * @test
     */
    public function it_has_all_necessary_fields()
    {
        $invoice = new Invoice();

        $this->assertObjectHasAttribute('number', $invoice);

        $this->assertObjectHasAttribute('type', $invoice);
        $this->assertInstanceOf(InvoiceType::class, $invoice->type);

        $this->assertObjectHasAttribute('issuedOn', $invoice);
        $this->assertInstanceOf(DateTime::class, $invoice->issuedOn);

        $this->assertObjectHasAttribute('dueOn', $invoice);
        $this->assertInstanceOf(DateTime::class, $invoice->dueOn);
    }

}
