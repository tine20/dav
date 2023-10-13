<?php

namespace Tine20\DAVACL\Exception;

use Tine20\DAV;

/**
 * This exception is thrown when a client attempts to set conflicting
 * permissions.
 *
 * @copyright Copyright (C) 2007-2015 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class AceConflict extends DAV\Exception\Conflict {

    /**
     * Adds in extra information in the xml response.
     *
     * This method adds the {DAV:}no-ace-conflict element as defined in rfc3744
     *
     * @param DAV\Server $server
     * @param \DOMElement $errorNode
     * @return void
     */
    public function serialize(DAV\Server $server,\DOMElement $errorNode) {

        $doc = $errorNode->ownerDocument;

        $np = $doc->createElementNS('DAV:','d:no-ace-conflict');
        $errorNode->appendChild($np);

    }

}
