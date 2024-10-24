<?php 

include "connexion.php" ;
$affichagePost = $bdd->query("Select * from post");
include "header.php";
?>
    <main class="main">
        <section class="table__body">
            <table>
                <thead>
                <tr>
        <th>numero post</th>
        <th>Nom Agent</th>
        <th>matricule</th>
        <th>adresse</th>
        <th colspan="2" >Action</th>
      </tr>
                </thead>
                <tbody>
    <?php 
        while ( $dataRecup = $affichagePost->fetch()) {         
    ?>
        <tr>
            <td ><?php echo $dataRecup["id_post"]; ?></td>
            <td><?php echo $dataRecup["nom_agent"]; ?></td>
            <td><?php echo $dataRecup["numero_matricule"]; ?></td>
            <td><?php echo $dataRecup["adresse_mission"]; ?></td>
            <?php if ($isLoggedIn): ?>
            <td><a href="?delete=<?php echo $dataRecup['id_post']; ?>" class="btn btn-delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette Client ?');">supprimer</a></td>
            <td><a href="modification-post.php?mod=<?php echo $dataRecup['id_post']; ?>" class="btn btn-edit">Modifier</a></td>
            <?php endif; ?>
            
        </tr>
    <?php } ?>
    </tbody>
            </table>
        </section>
    </main>
   
    <?php 
    if (isset($_GET['delete'])) {
      $id = $_GET['delete'];
      try {
          $stmt = $bdd->prepare("DELETE FROM post WHERE id_post = ?");
          $stmt->execute([$id]);
          $message = "Post supprimé avec succès !";
          header("location:affichage-post.php");
      } catch (PDOException $e) {
          $message = "Erreur lors de la suppression : " . $e->getMessage();
      }
}

?>

<?php include "footer.php" ?>
