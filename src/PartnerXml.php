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

namespace Vanvo\NavInvoiceXml;

use Vanvo\NavInvoiceXml\Dto\Partner;

class PartnerXml extends Xml
{
    public function __construct(Partner $partner)
    {
        parent::__construct();

        $this->add('adoszam', $partner->getTaxNumber());
        if ($partner->getTaxNumberIntl()) {
            $this->add('kozadoszam', $partner->getTaxNumberIntl());
        }
        $this->add('nev', $partner->getName());
    }
}
