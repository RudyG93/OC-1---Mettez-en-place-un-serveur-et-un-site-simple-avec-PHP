<?php
require_once 'header.php';
require_once 'Database/dbConnection.php';
require_once 'Database/request.php';
?>

<div id="liste-oeuvres">
    <?php
    $oeuvres = getOeuvres();

    $idQueryParam = intval($_GET['id']);

    // var_dump($_GET);
    
    // Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
    if (empty($idQueryParam)) {
        header('Location: index.php');
        exit;
    }

    $oeuvre = null;

    // On parcourt les oeuvres du tableau afin de rechercher celle qui a l'id précisé dans l'URL
    foreach ($oeuvres as $oeuvre) {
        // intval permet de transformer l'id de l'URL en un nombre (exemple : "2" devient 2)
        if ($oeuvre['id'] == $idQueryParam) {
            $selectedOeuvre = $oeuvre;
            break; // On stoppe le foreach si on a trouvé l'oeuvre
        }
    }

    // Si aucune oeuvre trouvé, on redirige vers la page d'accueil
    if (is_null($selectedOeuvre)) {
        header('Location: index.php');
        exit;
    }

    echo '<div class="oeuvre">';
    echo '<h2>' . htmlspecialchars($selectedOeuvre['titre']) . '</h2>';
    echo '<p><strong>Artiste:</strong> ' . htmlspecialchars($selectedOeuvre['artiste']) . '</p>';
    echo '<img src="' . htmlspecialchars($selectedOeuvre['image']) . '" alt="' . htmlspecialchars($selectedOeuvre['titre']) . '">';
    echo '<p>' . htmlspecialchars($selectedOeuvre['description']) . '</p>';
    echo '</div>';
    ?>
</div>

<?php require 'footer.php'; ?>