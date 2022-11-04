<?php require_once './inc/header.inc.php';


if(isset($_GET['id'])){ 
    $data = $pdo->query("SELECT * FROM advert WHERE id = '$_GET[id]'");
}

// Je vérifie que l'id existe dans ma bdd
if($data->rowCount() <= 0){ 
    header('location:accueil.php');
    exit();
}

// Affichage de mon annonce
$annonce = $data->fetch(PDO::FETCH_ASSOC);

$content .= '<div class="container text-center">';
$content .= "<p> Titre : ". $annonce['title'] . "</p>";
$content .= "<p> Description : ". $annonce['description'] . "</p>";
$content .= "<p> Code Postal : ". $annonce['postal_code'] . "</p>";
$content .= "<p> Ville : ". $annonce['city'] . "</p>";
$content .= "<p> Type : ". $annonce['type'] . "</p>";
$content .= "<p> Prix : ". $annonce['price'] . "</p>";
$content .= '</div>';

// Condition pour réserver un bien
if($annonce['reservation_message'] == 'Réserver'){

    $content .= '<div class="alert alert-danger text-center" role="alert">Le bien est actuellement réservé</div>';
    } else {
    $content .= "<div class=\"container d-flex justify-content-center\">";
    $content .= "<form method=\"POST\">";
    $content .= "<input type=hidden name=\"id\" value=\"$annonce[id]\">";
    $content .= "<label for=\"reservation_message\">Etat :</label>";
    $content .= "<select name=\"reservation_message\" id=\"reservation_message\">";       
            $content .= "<option>Réserver</option>";
    $content .= "</select><br><br>";
    $content .= '<input type="submit" class="btn btn-lg btn-dark mb-5" name="reserver" value="Réserver">';
    $content .= "</form>";
    $content .= "</div>";
    }
// Update de la réservation dans la bdd
    if (isset($_POST['reserver'])) {
    $req = $pdo->query("UPDATE advert SET reservation_message = 'Réserver' WHERE id = '$_POST[id]'"); 
    }

    


?>


<h1 class="text-center">Voir une annonce</h1>

<!-- Affichage du contenu traité -->

<?= $content; ?>

<?php require_once './inc/footer.inc.php';
 ?>