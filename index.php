<?php
    require 'header.php';
    require 'bdd.php';
?>
<div id="liste-oeuvres">
    <?php
        $stmt = $pdo->query("SELECT * FROM oeuvres");
        $oeuvres = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($oeuvres as $oeuvre) {
            echo '<div class="oeuvre">';
            echo '<h2>' . htmlspecialchars($oeuvre['titre']) . '</h2>';
            echo '<p><strong>Artiste:</strong> ' . htmlspecialchars($oeuvre['artiste']) . '</p>';
            echo '<img src="' . htmlspecialchars($oeuvre['image']) . '" alt="' . htmlspecialchars($oeuvre['titre']) . '">';
            echo '</div>';
        }
    ?>
</div>
<?php require 'footer.php'; ?>
