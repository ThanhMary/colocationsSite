<?php
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=etudiant1;charset=utf8', 'root', '');
  }
  catch (Exception $e)
  {
          die('Erreur : ' . $e->getMessage());
  }

  $req = $bdd->query("SELECT * FROM recherche ORDER BY Num_Demande ASC ");

  while ($recherche = $req->fetch()){?>
    <div class="container-recherche">
      <h1><?php echo $recherche['Titre_recherche'];?></h1>
      <div>
        <p><?php echo $recherche['Description'];?></p>
        <p><?php echo $recherche['Ville'];?></p>
        <p><?php echo $recherche['Code_postal'];?></p>
        <p><?php echo $recherche['Prix_max'];?></p>
        <p><?php echo $recherche['Surface_min'];?></p>
        <p><?php echo $recherche['Date_Disponibilite'];?></p>
        <p><?php echo $recherche['Date_Depart'];?></p>
      </div>
    </div>
    <?php
  }?>

  <a href="index.php"> retour </a>
