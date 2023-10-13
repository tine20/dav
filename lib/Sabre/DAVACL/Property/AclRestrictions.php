<?php

namespace Tine20\DAVACL\Property;

use Tine20\DAV;

/**
 * AclRestrictions property
 *
 * This property represents {DAV:}acl-restrictions, as defined in RFC3744.
 *
 * @copyright Copyright (C) 2007-2015 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class AclRestrictions extends DAV\Property {

    /**
     * Serializes the property into a DOMElement
     *
     * @param DAV\Server $server
     * @param \DOMElement $elem
     * @return void
     */
    public function serialize(DAV\Server $server,\DOMElement $elem) {

        $doc = $elem->ownerDocument;

        $elem->appendChild($doc->createElementNS('DAV:','d:grant-only'));
        $elem->appendChild($doc->createElementNS('DAV:','d:no-invert'));

    }

}
