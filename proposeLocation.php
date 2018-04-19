<?php
	session_start();
?>
<!doctype html>
<html>
	<head>
		
		<title> Propose de Location </title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel= "stylesheet" type="text/css" href="css/font-awesome.css">
		
		<script src="js/jquery-3.2.1.js"></script>
		<script src="js/bootstrap.js"></script>
  </head>

  <body>
 <?php if(!$_SESSION['connection']){
				header('Location: connection.php');
				exit();
			}
			else {?>
	<div class="container">
	<><center><h4><a href="index.php"> PAGE D'ACCEUIL  </a></center></h4>
	<div class="form-style-10">
		<h1>Depôt d'annonce<span>Veuillez saisir vos informations</span></h1>
	
			<form class="propose-location" method="POST" action="proposeLocation.php" enctype="multipart/form-data">
				<div class="section"><span>1</span>Titre &amp;  Description</div>
						<div class="inner-wrap">
							<div ><label>Titre de l'annonce</label><input  type="text" name="titre" /></div>
							<div><label>Description</label><textarea  rows="5" name="description"/></textarea></div>
						</div>
				<div class="section"><span>2</span>Adresse </div>
						<div class="inner-wrap">	
							<div><label>Adresse</label><input  type="text" name="adresse" /></div>
							<div><label>Ville</label><input  type="text" name="ville" /></div>
							<div><label>Code postal</label><input type="text" name="cPostal"/></div>
							<div><label>Email</label><input  type="email" name="email" /></div>
						</div>
				
				<div class="section"><span>3</span>Photos </div>
						<div class="inner-wrap">	
							<div><label>Photo 1</label><input type="file" name="photo1" /></div><br>
							<div><label>Photo 2</label><input type="file" name="photo2" /></div><br>
							<div><label>Photo 3</label><input  type="file" name="photo3" /></div><br>
						</div>

				<div class="section"><span>4</span>Prix &amp;  Date</div>
						<div class="inner-wrap">	
								<div><label>Prix</label><input  type="number" name="prix" /></div>
								<div><label>Surface</label><input type="number"  name="surface" /></div>
								<div><label>Nombre de perssones</label><input class="form-control" type="number" name="nbPersonnes" /></div>
								<div><label>Date_Disponibilité</label><input class="form-control" type="date" name="dateDispo" /></div>
								<div><label>Date_Depart</label><input class="form-control"  type="date" name="dateDepart" /></div>
						</div>
					<div class="button-section">		 
						<center><button  type="submit">Envoyer</button></center>
					</div>
				
	    </form>
 </div>


  <?php

    if(isset($_POST))
    {
      if(!empty($_POST['adresse']) AND !empty($_POST['ville']) AND !empty($_POST['cPostal']) AND !empty($_POST['description'])
			AND !empty($_POST['prix']) AND !empty($_POST['surface']) AND !empty($_POST['nbPersonnes']) AND!empty($_POST['dateDispo']))
			{

	      try
	      {
	        $bdd = new PDO('mysql:host=localhost;dbname=colocation;charset=utf8', 'root', '');
	      }
	      catch (Exception $e)
	      {
	              die('Erreur : ' . $e->getMessage());
	      }
				$titre = $_POST['titre'];
				$adresse = $_POST['adresse'];
				$mail = $_POST['email'];
				$ville = strToLower($_POST['ville']);
				$ville = ucfirst($ville);
				$cPostal = $_POST['cPostal'];
				$description = $_POST['description'];
				$photo1 = $_FILES['photo1'];
				$photo2 = $_FILES['photo2'];
				$photo3 = $_FILES['photo3'];
				$prix = $_POST['prix'];
				$surface = $_POST['surface'];
				$nbPersonnes = $_POST['nbPersonnes'];

				if(!empty($_POST['dateDispo'])){
					$dateDispo = Date('Y-m-d h:i:s');
				}
				else {
					$dateDispo = $_POST['dateDispo'];
				}
				$dateDepart = $_POST['dateDepart'];
				$dateAnnonce = Date('Y-m-d h:i:s');
			

				$req = $bdd ->prepare('INSERT INTO annonce(Titre_annonce, Adresse,  Ville, Code_postal, Description, Photo1, Photo2, Photo3, Prix, Surface, Nb_Personne, Date_Disponibilite, Date_Fin, Date_Annonce, Email)
										VALUES(:titre, :adresse,  :ville, :code_postal, :description, :photo1, :photo2, :photo3, :prix, :surface, :nb_personnes, :date_disponibilite, :date_fin, :date_annonce, :email)');

				$req->execute(array(
					'titre' => $titre,
					'adresse' => $adresse,
					'ville' => $ville,
					'code_postal' => $cPostal,
					'description' => $description,
					'photo1' => $photo1,
					'photo2' => $photo2,
					'photo3' => $photo3,
					'prix' => $prix,
					'surface' => $surface,
					'nb_personnes' => $nbPersonnes,
					'date_disponibilite' => $dateDispo,
					'date_fin' => $dateDepart,
					'date_annonce' => $dateAnnonce,
					'email' => $mail,
				));
				echo 'annonce posté';

			}
       }
	}
  ?>
  <footer  class="container-fluid bg-4 text-center">
			  <p>Projet du site de colocation  SIO-ILEC 2017</p>
	</footer>
  </body>
  </html>