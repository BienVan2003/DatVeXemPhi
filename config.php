<?php
    define('HOST','127.0.0.1');
    define('USER','root');
    define('PASS','');
    define('DB','mvc_movie');

    class DB {
        private static $conn;
    
        public static function getConnection() {
            if (self::$conn == null) {
                $dsn = "mysql:host=" . HOST . ";dbname=" . DB . ";charset=utf8";
                $options = array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                );               
                self::$conn = new PDO($dsn, USER, PASS, $options);
            }
            
            return self::$conn;
        }
    }
    