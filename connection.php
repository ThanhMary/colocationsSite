<?php
	session_start();
?>

<!doctype html>
<html lang="fr">
	<head>
	<meta charset="utf-8">
	<title>CONNECTION</title>
	
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel= "stylesheet" type="text/css" href="css/font-awesome.css">
	
		
	
			<script src="js/jquery-3.2.1.js"></script>
			<script src="js/bootstrap.js"></script>
	</head>

<body>
		<div class="container" >
		<br><center><h4><a href="index.php"> PAGE D'ACCEUIL  </a></center></h4>
		<div class="form-style-10">
		<h1>CONNEXION<span>Veuillez vous identifier</span></h1>
         	     <form method="POST" action="connection.php">
					<div class="section"></div>
						<div class="inner-wrap">
								<label  for="exampleInputEmail3">Email address</label>
								<input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" name="email">
								<label for="exampleInputPassword3">Password</label>
						 		<input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password" name="password">
							<br> <center> <button class = "btn-block"  type="submit" >Sign in</button></center>
						</div>
					</div>
	   			</form>
		</div>
		</div>

	<div>
		<center><img class="img-responsive" src="photos/cle.jpg"></center>
</div>
	<?php

		if(isset($_POST))
		{
			if(!empty($_POST['email']) AND !empty($_POST['password']))
			{
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=colocation;charset=utf8','root','');
				}
				catch (Exception $e)
				{
					die('Erreur: ' .$e->getMessage());
				}

				$mail = strtolower($_POST['email']);
				$pass = $_POST['password'];

				$req = $bdd->query('SELECT email, password, prenom, nom,tel, ecole FROM etudiant WHERE email LIKE "'.$mail.'"');

				$donnee = $req->fetch();

				if($donnee['email'] == $mail AND $donnee['password'] == $pass)
				{
					$_SESSION['mail'] = $donnee['email'];
					$_SESSION['nom'] = $donnee['nom'];
					$_SESSION['prenom'] = $donnee['prenom'];
					$_SESSION['ecole'] = $donnee['ecole'];
					$_SESSION['connection'] = true;

					echo 'Connection reussie' ;

					header('Location: index.php');
					exit();

				}
				else
				{
					echo "<p>Identifiants érronés</p>";
				}
			}
		}
	?>
<footer  class="container-fluid bg-4 text-center">
			  <p>Projet du site de colocation  SIO-ILEC 2017</p>
</footer>
</body>

</html>
