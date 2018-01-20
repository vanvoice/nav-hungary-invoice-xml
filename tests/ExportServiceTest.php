<?php
/**
 * Contains the ExportServiceTest class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-19
 *
 */

namespace Vanvo\NavInvoiceXml\Tests;

use Vanvo\NavInvoiceXml\Models\XmlWriter;
use Vanvo\NavInvoiceXml\Services\Exporter;
use PHPUnit\Framework\TestCase;

class ExportServiceTest extends TestCase
{
    /** @test */
    public function it_can_be_created()
    {
        $exporter = new Exporter(new XmlWriter());

        $this->assertInstanceOf(Exporter::class, $exporter);
    }
}
