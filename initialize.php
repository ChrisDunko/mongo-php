<?php
    const ROOT_FILE = __DIR__;
    require_once ROOT_FILE . '/configuration.php';

    if (DEBUG_MODE) {
            error_reporting(E_ALL);
        }

    if(isset($_SERVER['HTTP_HOST'])) {
        $hostParts = explode('.', $_SERVER['HTTP_HOST']);
        switch ($hostParts[0]) {
            case 'dev':
            case 'dev2': define('ENVIRONMENT', 'DEVELOPMENT'); break;
            default: define('ENVIRONMENT', 'PRODUCTION');
        }
        define("ROOT_WWW", ENVIRONMENT == 'DEVELOPMENT' ? 'http://' . $_SERVER['HTTP_HOST'] : 'https://' . $_SERVER['HTTP_HOST']);

        ob_start();
    } else {
        // Unittesting + manually set for DataMigrations
        define('ENVIRONMENT', 'DEVELOPMENT');
    }

    require_once ROOT_FILE . '/vendor/autoload.php';

//    if(DB_REL_SERVER) {
//        $dbrelconnection = Core_Model::database_rel_connect();
//        Core_Model::set_database_rel($dbrelconnection);
//    }
//    if(DB_DOC_SERVER) {
//        $dbdocconnection = Core_Model::database_doc_connect();
//        Core_Model::set_database_doc($dbdocconnection);
//    }
