<?php
    require_once dirname(__FILE__)."/../plugins/medoo/medoo.php";

    $GLOBALS['database'] = new medoo([
        // required
        'database_type' => 'mysql',
        'database_name' => 'ppl1',
        'server' => 'localhost',
        'username' => 'luthfi',
        'password' => 'underground',
        'charset' => 'utf8',

        // optional
        'port' => 3306,
        // driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
        'option' => [
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        ]
    ]);
?>