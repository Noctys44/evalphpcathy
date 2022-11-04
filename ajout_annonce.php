<!-- PARTIE TRAITEMENT -->

<?php require_once './inc/header.inc.php';

// Requête pour INSERT INTO dans la bdd

if($_POST)
{   
    $title = $_POST['title'];
    $description = $_POST['description'];
    $postal = $_POST['postal_code'];
    $city = $_POST['city'];
    $type = $_POST['type'];
    $price = $_POST['price'];

    foreach($_POST as $key => $valeur)
    {
        $_POST[$key] = htmlspecialchars(addslashes($valeur));
    }

    if(empty($error)) {
        $pdo->query("INSERT INTO advert (title, description, postal_code, city, type, price) VALUES ('$title', '$description', '$postal', '$city', '$type', '$price')");

        $content .='<div class="alert alert-success" role="alert">
        L\'annonce a bien été enregistrée :)
        </div>';
    }
    $content .= $error;
}

 ?>

<!-- PARTIE AFFICHAGE -->

<h1 class="text-center">Ajouter une annonce</h1>

<!-- Affichage du contenu traité -->

<?= $content; ?>

<!-- FORM en METHOD POST -->

<form method="POST" action="">

    
    <label for="title">Titre de l'annonce</label>
    <input type="text" name="title" placeholder="Titre de l'annonce" id="title" class="form-control"><br>

    <label for="description">Description de l'annonce</label>
    <textarea name="description" placeholder="Description de l'annonce" id="description" class="form-control"></textarea><br>

    <label for="postal_code">Code postal</label>
    <input type="text" name="postal_code" placeholder="Code postal" id="postal_code" class="form-control"><br>

    <label for="city">Ville</label>
    <input type="text" name="city" placeholder="Ville" id="city" class="form-control"><br>

    <label for="type">Type d'annonce</label>
    <select name="type" id="type" class="form-control">
        <option value="vente">Vente</option>
        <option value="location">Location</option>
    </select>
    <br>

    <label for="price">Prix</label>
    <input type="text" name="price" placeholder="Prix" id="price" class="form-control"><br>

    <input type="submit" value="Ajouter l'annonce" class="btn btn-lg btn-dark">


<?php require_once './inc/footer.inc.php';
 ?>