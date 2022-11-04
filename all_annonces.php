<?php require_once './inc/header.inc.php';

$res = $pdo->query("SELECT * FROM advert");
$content .= '<table class="table table-striped"><tr>';

// Boucle pour afficher toutes les colonnes de ma table
for ($i = 0; $i < $res->columnCount(); $i++) {

    $colonne = $res->getColumnMeta($i);    
    $content .= '<th class="text-center">' . $colonne['name'] . '</th>';
}

$content .= '</tr>';


// Boucle pour afficher les données
while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
    $content .= '<tr>';

    foreach ($row as $key => $value) {
                   
        $value = substr($value,0, 100);
        $content .= "<td class=\"align-middle text-center\">$value</td>";
        
    }
    $content .= '</tr>';
}

$content .= '</table>';
 ?>


<h1 class="text-center">Toutes nos annonces</h1>

<!-- Affichage du contenu traité -->

<?= $content; ?>

<?php require_once './inc/footer.inc.php';
 ?>