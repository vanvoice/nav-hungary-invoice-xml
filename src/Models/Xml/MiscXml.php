<?php
/**
 * Contains the MiscXml class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-20
 *
 */

namespace Vanvo\NavInvoiceXml\Models\Xml;

use Vanvo\NavInvoiceXml\Dto\Misc;

class MiscXml extends Xml
{
    public function __construct(Misc $misc)
    {
        $this->append('<nem_kotelezo>');
        $misc->getDueOn() ? $this->append("<fiz_hatarido>{$misc->getDueOn()->format('Y-m-d')}</fiz_hatarido>") : $this->append("<fiz_hatarido></fiz_hatarido>");

        $this->append("<fiz_mod>{$misc->getPaymentMethod()}</fiz_mod>");
        $this->append("<penznem>{$misc->getCurrency()}</penznem>");
        $this->append("<befogado_bankszla>{$misc->getBankAccountNumber()}</befogado_bankszla>");
        $this->append('</nem_kotelezo>');
    }
}
