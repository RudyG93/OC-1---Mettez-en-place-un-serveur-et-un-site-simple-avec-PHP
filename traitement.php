<?php
require_once 'header.php';
require_once 'Database/dbConnection.php';
require_once 'Database/request.php';

$errors = [];

if (empty($_POST['titre'])) {
    $errors[] = "Le titre doit être saisi.";
}
if (empty($_POST['artiste'])) {
    $errors[] = "L'artiste doit être saisi.";
}
if (strlen($_POST['description']) < 3) {
    $errors[] = "La description doit contenir au moins 3 caractères.";
}
if (!filter_var($_POST['image'], FILTER_VALIDATE_URL)) {
    $errors[] = "Le lien de l'image doit être une URL valide.";
}

if (empty($errors)) {
    insertOeuvre();
    header('Location: index.php');
    exit;
} else {
    foreach ($errors as $error) {
        echo '<p style="color: red;">' . htmlspecialchars($error) . '</p>';
    }
}