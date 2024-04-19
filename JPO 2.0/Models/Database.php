<?php 
namespace Models;

use Autoloader\Autoloader;
use PDO;

class Database{
    public static function getPDO(){
        $host = '127.0.0.1';
        $db = 'site_actualite';
        $user = 'root';
        $pass = '';
        $port = '3306';
        $charset = 'utf8mb4';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
        return $pdo = new PDO($dsn, $user, $pass);
    }
    public static function preparedQuery($sql, $params = []) {
        $pdo = self::getPDO();
        $stmt = $pdo->prepare($sql);
        
        foreach ($params as $param => $value) {
            $stmt->bindValue($param, $value);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
 

}