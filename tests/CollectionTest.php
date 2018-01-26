<?php
/**
 * Contains the CollectionTest class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-22
 *
 */

namespace Vanvo\NavInvoiceXml\Tests;

use PHPUnit\Framework\TestCase;
use Vanvo\NavInvoiceXml\Collection;

class CollectionTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_the_proper_items()
    {
        $collection = new Collection(
            [
                'name'   => 'Test',
                'number' => 22
            ],
            [
                'name'   => 'Elek',
                'number' => 32
            ],
            [
                'name'   => 'Vanvo',
                'number' => 25
            ]
        );

        $this->assertCount(3, $collection);
        $this->assertSame(['name' => 'Test', 'number' => 22], $collection->first());
        $this->assertSame(['name' => 'Vanvo', 'number' => 25], $collection->last());
    }
}
