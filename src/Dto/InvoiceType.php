<?php
/**
 * Contains the InvoiceType class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2018-01-19
 *
 */

namespace Vanvo\NavInvoiceXml\Dto;

use Konekt\Enum\Enum;

class InvoiceType extends Enum
{
    const INVOICE             = 1;
    const MODIFY_INVOICE      = 2;
    const INVALID_INVOICE     = 3;
    const COLLECTABLE_INVOICE = 4;
    const DOCUMENT_AS_INVOICE = 5;

    protected static $labels = [
        self::INVOICE             => 'számla',
        self::MODIFY_INVOICE      => 'módosító számla',
        self::INVALID_INVOICE     => 'érvénytelenítő számla',
        self::COLLECTABLE_INVOICE => 'gyűjtőszámla',
        self::DOCUMENT_AS_INVOICE => 'számlával egy tekintet alá eső okirat'
    ];
}
