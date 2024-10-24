<?php

include "header.php";

?>

<section class="main">

  <div class="flex-container">
    <div class="content-container">
      <div class="form-container">
        <form action="/action_page.php">
          <h1>
            Affecter un employé
          </h1>
          <br>
          <br>
          <span class="subtitle">Nom de l'employé :</span>
          <br>
          <input type="text" id="nom" name="nom" pattern="[a-zA-Z0-9 ]+" required>
          <br>
          <span class="subtitle">Numero-matricule :</span>
          <br>
          <input type="number" id="numero-matricule" name="numero" required>

          <br>
          <span class="subtitle">Adresse de la mission :</span>
          <br>
          <input type="text" id="numero-matricule" name="adresse" pattern="[a-zA-Z0-9 ]+" required>
          <br><br>
          <input type="submit" value="Affecter" class="button-flex">
          <?php if ($isLoggedIn): ?>
                    <a href="affichage-post.php" class="voir">Voir toutes les entrées</a>
          <?php endif; ?>
        </form>
      </div>
    </div>
  </div>

  <?php

  if (isset($_POST['btnValider'])) {
    $nom_agent = ucfirst($_POST['nom']);
    $numero_matricule = $_POST['numero'];
    $adresse_mission = $_POST['adresse'];

    // Vérifier si un post avec le même numéro matricule et adresse de mission existe déjà
    $check_duplicate = $bdd->prepare("SELECT * FROM post WHERE nom_agent= :nom_agent AND numero_matricule = :numero_matricule AND adresse_mission = :adresse_mission");
    $check_duplicate->bindParam(':numero_matricule', $nom_agent);
    $check_duplicate->bindParam(':numero_matricule', $numero_matricule);
    $check_duplicate->bindParam(':adresse_mission', $adresse_mission);
    $check_duplicate->execute();

    // Si aucun doublon n'est trouvé, insérer les données
    if ($check_duplicate->rowCount() == 0) {
      $post_insertion = "INSERT INTO post (nom_agent, numero_matricule, adresse_mission) VALUES ('$nom_agent', '$numero_matricule', '$adresse_mission')";

      $bdd->exec($post_insertion);
      header("location:affichage-post.php");
    } else {
      echo "<p class='register failed'>Ce post avec ce numéro matricule et cette adresse existe déjà dans la base de données.</p>";
    }


  }

  ?>

</section>


<?php include "footer.php" ?>