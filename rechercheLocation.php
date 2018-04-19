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


		<nav class="navbar navbar-inverse">

			<div class="container-fluid">
<h1>ILEC-COLOCATION</h1>
    <?php $date = Date("Y-m-d H:i:s"); ?>

    <div class="container">
	<h1> LES ANNONCES </h1>
      <form class="recherche-location" method="POST" action="rechercheLocation.php">
				<div class="col-md-5"><label>Titre </label><input class="form-control" type"text" name="titre" /></div>
        <div class="col-md-5"><label>Ville *</label><input class="form-control" type"text" name="ville" /></div>
        <div class="col-md-5"><label>Code postal</label><input class="form-control" type="number" name="cPostal"/></div>

        <div class="col-md-5"><label>Surface minimum (m²)</label><input class="form-control" type="number"  name="surfaceMin" min="0"/></div>
        <div class="col-md-5"><label>Prix maximum *</label><input class="form-control" type="number"  name="prixMax" min="0" /></div>
        <div class="col-md-5"><label>Nombre de personnes maximun</label><input class="form-control" type="number" name="nbPersonnes" min="1" /></div>
        <div class="col-md-5"><label>Date_Disponibilité</label><input class="form-control" type="date" name="dateDispo" value=<?php echo "".$date.""; ?>  /></div>
        <div class="col-md-5"><label>Date_Depart</label><input class="form-control" type="date" name="dateDepart" /></div>
        <div class="col-md-5"><input type="submit" value="valider"/></div>
      </form>
    </div>


  <?php
    if(isset($_POST))
    {
			if(!empty($_POST['titre']))
				$titre = $_POST['titre'];


      if(!empty($_POST['ville']) || !empty($_POST['description']) || !empty($_POST['prixMax']))
      {
        $ville = $_POST['ville'];
        $cPostal = $_POST['cPostal'];

				if(!empty($_POST['description']))
        	$description = $_POST['description'];
				else {
						$description = '';
				}

        $surfaceMin = $_POST['surfaceMin'];

        if(!empty($_POST['prixMax']))
        {
          $prixMax = $_POST['prixMax'];
        }

        $nbPersonnes = $_POST['nbPersonnes'];
        $dateDispo = $_POST['dateDispo'];
        $dateDepart = $_POST['dateDepart'];

				echo $dateDispo;



	      try
	      {
	        $bdd = new PDO('mysql:host=localhost;dbname=etudiant1;charset=utf8', 'root', '');
	      }
	      catch (Exception $e)
	      {
	              die('Erreur : ' . $e->getMessage());
	      }


	      $req = $bdd->prepare('INSERT INTO recherche VALUES (:titre, :ville, :cPostal, :description, :prixMax, :surfaceMin, :dateDispo, :dateDepart)');

	      $req-> execute(array(
					'titre' => $titre,
	        'ville' => $ville,
	        'cPostal' => $cPostal,
	        'description' => $description,
	        'prixMax' => $prixMax,
	        'surfaceMin' => $surfaceMin,
	        'dateDispo' => $dateDispo,
	        'dateDepart' => $dateDepart
	      ));

	      echo "traitement de l'annonce";
			}
	   }



  ?>
  <p><a href="index.php"> retour </a></p>
</body>
