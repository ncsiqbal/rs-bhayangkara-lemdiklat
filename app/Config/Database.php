<?php

namespace Config;

use CodeIgniter\Database\Config;

class Database extends Config
{
    /**
     * The directory that holds the Migrations and Seeds directories.
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Lets you choose which connection group to use if no other is specified.
     */
    public string $defaultGroup = 'default';

    /**
     * The default database connection.
     *
     * @var array<string, mixed>
     */
    public array $default = [
        'DSN'          => '',
        'hostname'     => '',
        'username'     => '',
        'password'     => '',
        'database'     => '',
        'DBDriver'     => 'MySQLi',
        'DBPrefix'     => '',
        'pConnect'     => false,
        'DBDebug'      => false,
        'charset'      => 'utf8mb4',
        'DBCollat'     => 'utf8mb4_general_ci',
        'swapPre'      => '',
        'encrypt'      => false,
        'compress'     => false,
        'strictOn'     => false,
        'failover'     => [],
        'port'         => 3306,
        'numberNative' => false,
        'foundRows'    => false,
        'dateFormat'   => [
            'date'     => 'Y-m-d',
            'datetime' => 'Y-m-d H:i:s',
            'time'     => 'H:i:s',
        ],
    ];

    public function __construct()
    {
        parent::__construct();

        $this->default['hostname'] = env(
            'DB_HOST',
            env('database.default.hostname', 'localhost')
        );

        $this->default['username'] = env(
            'DB_USER',
            env('database.default.username', '')
        );

        $this->default['password'] = env(
            'DB_PASS',
            env('database.default.password', '')
        );

        $this->default['database'] = env(
            'DB_NAME',
            env('database.default.database', '')
        );

        $this->default['DBDriver'] = env(
            'DB_DRIVER',
            env('database.default.DBDriver', 'MySQLi')
        );

        $this->default['port'] = (int) env(
            'DB_PORT',
            env('database.default.port', 3306)
        );

        $this->default['DBDebug'] = ENVIRONMENT !== 'production';
    }
}