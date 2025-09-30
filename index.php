<?php
    require_once 'header.php';
    require_once 'Database/dbConnection.php';
    require_once 'Database/request.php';
?>

<div id="liste-oeuvres">
    <?php
        $oeuvres = getOeuvres();

        foreach ($oeuvres as $oeuvre) {
            echo '<div class="oeuvre">';
            echo '<h2>' . htmlspecialchars($oeuvre['titre']) . '</h2>';
            echo '<p><strong>Artiste:</strong> ' . htmlspecialchars($oeuvre['artiste']) . '</p>';
            echo '<a href="oeuvre.php?id=' . urlencode($oeuvre['id']) . '"><img src="' . htmlspecialchars($oeuvre['image']) . '" alt="' . htmlspecialchars($oeuvre['titre']) . '"></a>';
            echo '</div>';
        }
    ?>
</div>

<?php require 'footer.php'; ?>
