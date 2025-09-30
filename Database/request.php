<?php

require_once 'Database/dbConnection.php';

function getOeuvres(): array
{
    $dbConnection = connect();

    $stmt = $dbConnection->query("SELECT * FROM oeuvres");
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insertOeuvre()
{
    $dbConnection = connect();

    $insert = $dbConnection->prepare("INSERT INTO oeuvres (titre, artiste, image, description) VALUES (?, ?, ?, ?)");

    return $insert->execute([$_POST['titre'], $_POST['artiste'], $_POST['image'], $_POST['description']]);
}