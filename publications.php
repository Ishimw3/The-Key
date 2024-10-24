<?php
include "connexion.php";
include "header.php";

?>

    <section class="main">

        <div class="flex-container">
            <div class="content-container">
              <div class="form-container">
                <form action="publications.php" method="POST">
                  <h1>
                    Ecrire une publication
                  </h1>
                  <br>
                  <br>
                  <span class="subtitle">Date de Publication:</span>
                  <br>
                  <input type="date" id="date_pub" name="date_pub" required value="">
                  <br>
                  <br>
                  <span class="subtitle">Titre de l'article :</span>
                  <br>
                  <input type="text" id="nom" name="titre" minlength="10" required>
                  <br>
                  <span class="subtitle">Article :</span>
                  <br>
                  <textarea type="text" id="article" name="article" minlength="200" required></textarea>
                  <br><br>
                  <input type="submit" value="Publier" class="button-flex" name="btnValider">
                  <?php if ($isLoggedIn): ?>
                    <a href="affichage-pub.php" class="voir">Voir toutes les entrées</a>
                    <?php endif; ?>
                </form>
              </div>
            </div>
          </div>

          <?php 
    
            if(isset($_POST['btnValider'])){
                $Recupdate = $_POST['date_pub'];
                $RecupTitre = $_POST['titre'];
                $Recuparticle = $_POST['article'];
                

                 // Vérifier si une publication avec la même date et le même article existe déjà
                $check_duplicate = $bdd->prepare("SELECT * FROM publication WHERE date_pub = :date_pub AND article = :article");
                $check_duplicate->bindParam(':date_pub', $Recupdate);
                $check_duplicate->bindParam(':article', $Recuparticle);
                $check_duplicate->execute();

                // Si aucun doublon n'est trouvé, insérer les données
                if ($check_duplicate->rowCount() == 0) {
                    $publication_insertion = "INSERT INTO publication (`date_pub`, `titre`, `article`) VALUES ('$Recupdate', '$RecupTitre', '$Recuparticle')";

                    $bdd->exec($publication_insertion );
                    header("location:affichage-pub.php");
                    
                    header("location:affichage-pub.php");
                } else {
                    echo "<p class='register failed'>Cette publication avec cette date et cet article existe déjà dans la base de données.</p>";
                }
            }

        ?>


    </section>

<?php include "footer.php" ?>