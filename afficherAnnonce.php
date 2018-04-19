<!Doctype html>
<html lang="fr">
	<head>
	<meta charset="utf-8">
		<title>Site de colocation</title>
			<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
			<link rel="stylesheet" type="text/css" href="css/style.css">

			<script src="js/jquery-3.2.1.js"></script>
			<script src="js/bootstrap.js"></script>
	</head>

<body>
			
<div class="container">
<?php
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=colocation;charset=utf8', 'root', '');
  }
  catch (Exception $e)
  {
          die('Erreur : ' . $e->getMessage());
  }

  $req = $bdd->query("SELECT * FROM annonce ORDER BY Num_Annonce ASC ");
  ?>   
  <?php
  while ($annonce = $req->fetch())
  {?>
<br><center><h4><a href="index.php"> PAGE D'ACCEUIL </a></center></h4>
<div class="container">

<div class="form-style-10">
	<h1>Les annonces</h1>
		<div class="section"><span>1</span>Titre &amp;  Description</div>
		<div class="inner-wrap">
			   <p><?php echo $annonce['Titre_annonce'];?></p>
			     <p> <?php echo $annonce['Description'];?> </p>
		</div>
		<div class="section"><span>2</span>Adresse </div>
		<div class="inner-wrap">
				<p> Addresse : <?php echo $annonce['Adresse'];?></p>
				<p> Ville : <?php echo $annonce['Ville'];?></p>
				<p> Code postal : <?php echo $annonce['Code_postal'];?>
				<p> Contact: <?php echo $annonce ['Email'];?></p>
		</div>
			
	<div class="section"><span>3</span>Prix &amp;  Disponibilité</div>
				<div class="inner-wrap">
						<p> Prix : <?php echo $annonce['Prix'];?> </p>
						<p> Surface : <?php echo $annonce['Surface'];?> </p>
						<p> Nombre de personnes : <?php echo $annonce['Nb_Personne'];?> </p>
						<p> Date de disponibilité : <?php echo $annonce['Date_Disponibilite'];?></p>
						<p> Libération du bien : <?php echo $annonce['Date_Fin'];?> </p>
				</div>
    </div>
    <?php } ?>


	<footer  class="container-fluid bg-4 text-center">
			  <p>Projet du site de colocation  SIO-ILEC 2017</p>
		</footer>

  </body>
  </html>
  
  