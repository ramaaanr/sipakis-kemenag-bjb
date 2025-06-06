<?php

namespace Sfy\AplikasiDataKemenagPAI\Config;

use PDO;
use PDOException;

class Database
{
    private static $instance = null;

    public static function getConnection(): PDO
    {
        if (self::$instance === null) {
            $config = [
                'host' => $_ENV['DB_HOST'],
                'port' => $_ENV['DB_PORT'],
                'database' => $_ENV['DB_DATABASE'],
                'username' => $_ENV['DB_USERNAME'],
                'password' => $_ENV['DB_PASSWORD'],
            ];

            try {
                $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['database']};charset=utf8mb4";
                self::$instance = new PDO($dsn, $config['username'], $config['password']);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                throw new \RuntimeException("Database connection failed: " . $e->getMessage());
            }
        }

        return self::$instance;
    }
}