<?php
require 'header.php';
require 'bdd.php';
?>

<div id="liste-oeuvres">
    <?php
    $stmt = $pdo->query("SELECT * FROM oeuvres");
    $oeuvres = $stmt->fetchAll(PDO::FETCH_ASSOC);


    // Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
    if (empty($_GET['id'])) {
        header('Location: index.php');
        exit;
    }

    $oeuvre = null;

    // On parcourt les oeuvres du tableau afin de rechercher celle qui a l'id précisé dans l'URL
    foreach ($oeuvres as $o) {
        // intval permet de transformer l'id de l'URL en un nombre (exemple : "2" devient 2)
        if ($o['id'] == intval($_GET['id'])) {
            $oeuvre = $o;
            break; // On stoppe le foreach si on a trouvé l'oeuvre
        }
    }

    // Si aucune oeuvre trouvé, on redirige vers la page d'accueil
    if (is_null($oeuvre)) {
        header('Location: index.php');
        exit;
    }

    echo '<div class="oeuvre">';
    echo '<h2>' . htmlspecialchars($oeuvre['titre']) . '</h2>';
    echo '<p><strong>Artiste:</strong> ' . htmlspecialchars($oeuvre['artiste']) . '</p>';
    echo '<img src="' . htmlspecialchars($oeuvre['image']) . '" alt="' . htmlspecialchars($oeuvre['titre']) . '">';
    echo '<p>' . htmlspecialchars($oeuvre['description']) . '</p>';
    echo '</div>';
    ?>
</div>

<?php require 'footer.php'; ?>