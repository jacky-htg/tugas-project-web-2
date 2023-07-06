<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 */
class Database extends Config
{
    /**
     * The directory that holds the Migrations
     * and Seeds directories.
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Lets you choose which connection group to
     * use if no other is specified.
     */
    public string $defaultGroup = 'postgre';

    /**
     * This database connection is used when
     * running database PostgreSql.
     */
    public $postgre = [
        'DSN'      => '',
        'hostname' => 'localhost',
        'username' => 'postgres', // ganti username u
        'password' => 'root', // ganti password u
        'database' => 'siakad',
        'DBDriver' => 'Postgre',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug'  => true,
        'cacheOn'  => false,
        'cacheDir' => '',
        'charset'  => 'utf8',
        'DBCollat' => 'utf8_general_ci',
        'swapPre'  => '',
        'encrypt'  => false,
        'compress' => false,
        'strictOn' => false,
        'failover' => [],
        'port'     => 5432, // Port default PostgreSQL
    ];

    /**
     * This database connection is used when
     * running database Mysql.
     */
    public $mysql = [
        'DSN'      => '',
        'hostname' => 'localhost',
        'username' => 'root', // ganti username u
        'password' => 'root', // ganti password u
        'database' => 'siakad',
        'DBDriver' => 'MySQLi',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug'  => true,
        'cacheOn'  => false,
        'cacheDir' => '',
        'charset'  => 'utf8',
        'DBCollat' => 'utf8_general_ci',
        'swapPre'  => '',
        'encrypt'  => false,
        'compress' => false,
        'strictOn' => false,
        'failover' => [],
        'port'     => 3306, // Port default MySQL
    ];

    /**
     * This database connection is used when
     * running database Production.
     */
    public $prod = [
        'DSN'      => '',
        'hostname' => 'localhost',
        'username' => 'root', // ganti username u
        'password' => 'root', // ganti password u
        'database' => 'siakad',
        'DBDriver' => 'MySQLi',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug'  => true,
        'cacheOn'  => false,
        'cacheDir' => '',
        'charset'  => 'utf8',
        'DBCollat' => 'utf8_general_ci',
        'swapPre'  => '',
        'encrypt'  => false,
        'compress' => false,
        'strictOn' => false,
        'failover' => [],
        'port'     => 3306, // Port default MySQL
    ];

    public function __construct()
    {
        parent::__construct();

        // Ensure that we always set the database group to 'tests' if
        // we are currently running an automated test suite, so that
        // we don't overwrite live data on accident.
        if (ENVIRONMENT === 'development') {
            $this->defaultGroup = 'postgre';
        } elseif (ENVIRONMENT === 'production') {
            $this->defaultGroup = 'prod';
        }
    }
}
