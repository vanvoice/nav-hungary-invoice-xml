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


namespace Konekt\NavInvoiceXml\Dto;


use Konekt\Enum\Enum;

class InvoiceType extends Enum
{
    const INVOICE =  1;
    /**
        2-egyszer�s�tett adattartalm� sz�mla/
        3-m�dos�t� sz�mla/
        4-�rv�nytelen�t� sz�mla/
        5-gy�jt�sz�mla/
        6-sz�ml�val egy tekintet al� es� okirat
     */

    static protected $labels = [
        self::INVOICE => 'számla',
    ];

}
