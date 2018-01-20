<?php
/**
 * Contains the PartnerXml class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-20
 *
 */

namespace Vanvo\NavInvoiceXml\Models\Xml;

use Vanvo\NavInvoiceXml\Dto\Partner;

class PartnerXml extends Xml
{
    public function __construct(Partner $partner)
    {
        $this->append("<adoszam>{$partner->getTaxNumber()}</adoszam>");
        $this->append("<kozadoszam>{$partner->getTaxNumberIntl()}</kozadoszam>");
        $this->append("<nev>{$partner->getName()}</nev>");
    }
}
