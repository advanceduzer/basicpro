<?php

namespace App\Orm;

use \PDO;

class Connect
{
    private PDO $connect;
    private string $dns;
    private string $user;
    private string $password;


    public function getConnect(): PDO
    {
        return $this->connect;
    }

    public function __construct()

    {
        $this->initConfig();
        $this->connect();
    }


    private function initConfig()
    {
        $config = require_once __DIR__ . '/../../config/dbConfig.php';

        $this->dns = $config['driver'] . ':host=' . $config['host'] . ';port=' . $config['port'] . ';dbname=' . $config['dbname'];
        $this->user = $config['user'];
        $this->password = $config['password'];
    }

    private function connect()
    {
        $this->connect = new PDO($this->dns, $this->user, $this->password);
    }
}
 
        $dns = 'mysql:host=localhost;port=10110;dbname=basic';
        $user = 'root';
        $password = 'root';
 