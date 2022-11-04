<?php require_once './inc/header.inc.php';

// Requête pour récupérer les données de la bdd
$req = $pdo->query("SELECT * FROM advert");

// Boucle pour afficher les infos
while($annonces = $req->fetch(PDO::FETCH_ASSOC)){
   
    $detail = substr($annonces['description'],0.150);

    $content .= '<div class="padding col-md-8 col-sm-6 col-lg-12">';
    $content .= '<div class="card justify-content-center" style="width: 80rem;">';
    $content .= '<div class="card-body">';
    $content .= "<h5 class=\"card-title\">$annonces[title]</h5>";
    $content .= "<p class=\"card-text\">$detail ...<a href=\"annonce.php?id=$annonces[id]\" class=\"text-decoration-none fw-bold\">Lire la suite</a></p>";
    $content .= "<p class=\"fw-bold\">$annonces[postal_code] $annonces[city]</p>";
    $content .= "<p class=\"fw-bold\">$annonces[price]</p>";
    $content .= "<a href=\"annonce.php?id=$annonces[id]\" class=\"btn btn-dark\">Voir cette annonce</a>";
    $content .= '</div>';
    $content .= '</div>';
    $content .= '</div>';
  }

 ?>


<h1 class="text-center">Le Bon Appart</h1>

<!-- Affichage du contenu traité -->

<?= $content; ?>

<?php require_once './inc/footer.inc.php';
 ?>