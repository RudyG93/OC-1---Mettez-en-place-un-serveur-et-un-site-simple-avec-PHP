<?php

// Connexion à la base de données
function connect(): \PDO
{
    try {
        $host = 'localhost';
        $dbname = 'artbox';
        $username = 'root';
        $password = '';

        $pdo = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    } catch (\PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }

    return $pdo;
}