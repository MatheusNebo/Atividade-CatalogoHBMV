<?php
class Database {
    private static $pdo = null;

    public static function conectar() {
        if (self::$pdo == null) {
            try {
                self::$pdo = new PDO("mysql:host=localhost;dbname=HBMV", "root", "");
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro na conexão: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}