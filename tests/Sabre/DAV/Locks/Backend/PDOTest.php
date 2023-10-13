<?php

namespace Tine20\DAV\Locks\Backend;

require_once 'Sabre/TestUtil.php';
require_once 'Sabre/DAV/Locks/Backend/AbstractTest.php';

class PDOTest extends AbstractTest {

    function getBackend() {

        if (!SABRE_HASSQLITE) $this->markTestSkipped('SQLite driver is not available');
        \Tine20\TestUtil::clearTempDir();
        mkdir(SABRE_TEMPDIR . '/pdolocks');
        $pdo = new \PDO('sqlite:' . SABRE_TEMPDIR . '/pdolocks/db.sqlite');
        $pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
        $pdo->query('CREATE TABLE locks ( id integer primary key asc, owner text, timeout text, created integer, token text, scope integer, depth integer, uri text)');
        $backend = new PDO($pdo);
        return $backend;

    }

    function tearDown() {

        \Tine20\TestUtil::clearTempDir();

    }

}
