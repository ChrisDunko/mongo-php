<?php declare(strict_types=1);

use Logs\models\Logs_Model;

#[AllowDynamicProperties]
class Core_Model
{
    static protected $databaseRelational;
    static protected $databaseDocument;
//    static protected $database = 'relational';
    static protected $tableName;
    static protected $dbColumns;
    static protected bool $immutable = false;
    static protected int $uid_length = 0;

    public function __construct(array|object $data = [], bool $minimal = false)
    {
        //
    }

    public static function database_doc_connect()
    {
        //
    }
    public static function set_database_doc($connection)
    {
        //
    }
}
