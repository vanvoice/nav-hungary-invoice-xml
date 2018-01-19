<?php
/**
 * Contains the InvoiceType.php class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2018-01-19
 *
 */

namespace Konekt\NavInvoiceXml\Enums;

use Konekt\Enum\Enum;

class InvoiceType extends Enum
{
    const INVOICE             = 1;
    const MODIFY_INVOICE      = 2;
    const INVALID_INVOICE     = 3;
    const COLLECTABLE_INVOICE = 4;
    const DOCUMENT_AS_INVOICE = 5;

    static protected $labels = [
        self::INVOICE             => 'számla',
        self::MODIFY_INVOICE      => 'módosító számla',
        self::INVALID_INVOICE     => 'érvénytelenitő számla',
        self::COLLECTABLE_INVOICE => 'gyűjtőszámla',
        self::DOCUMENT_AS_INVOICE => 'számlával egy tekintet alá eső okirat'
    ];
}
