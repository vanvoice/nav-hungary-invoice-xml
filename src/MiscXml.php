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

namespace Vanvo\NavInvoiceXml;

use Vanvo\NavInvoiceXml\Dto\Misc;

class MiscXml extends Xml
{
    public function __construct(Misc $misc)
    {
        parent::__construct();

        $this->createRoot('nem_kotelezo');

        if ($misc->getDueOn()) {
            $this->add('fiz_hatarido', $misc->getDueOn()->format('Y-m-d'));
        }

        if ($misc->getPaymentMethod()) {
            $this->add('fiz_mod', $misc->getPaymentMethod());
        }

        if ($misc->getCurrency()) {
            $this->add('penznem', $misc->getCurrency());
        }

        if ($misc->getBankAccountNumber()) {
            $this->add('befogado_bankszla', $misc->getBankAccountNumber());
        }
    }
}
