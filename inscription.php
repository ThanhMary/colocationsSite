<?php
	session_start();
?>
<!doctype html>
<html>
	<head>
		<!--<link rel="stylesheet" href="style.css" />-->
		<title> Inscription </title>
			<meta charset="utf-8">
			
		
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

		<script src="js/jquery-3.2.1.js"></script>
		<script src="js/bootstrap.js"></script>

	</head>

	<header>

	</header>

<body class = "container">
<br><center><h4><a href="index.php"> PAGE D'ACCEUIL </a></center></h4>
<div class="form-style-10">

<h1>Inscription<span>Veuillez saisir vos coordonnées!</span></h1>
<form action="inscription.php" method="POST">
    <div class="section"><span>1</span>Nom &amp; Prénom</div>
    <div class="inner-wrap">
        <label>Nom <input type="text" name="nom" /></label>
		 <label>Prenom <input type="text" name="prenom" /></label>
    </div>
	
    <div class="section"><span>2</span>Email &amp; Téléphone</div>
    <div class="inner-wrap">
        <label>Email  <input type="email" name="email" /></label>
        <label>Confirmer email  <input type="email" name="cemail" /></label>
		<label>Password <input type="password" name="password" /></label>
        <label>Numéro de Télephone <input type="text" name="tel" /></label>
    </div>

    <div class="section"><span>3</span>Etude &amp; Ecole</div>
        <div class="inner-wrap">
       <label>Ecole<input type="text" name="ecole" /></label>
       <label>Etude<input type="text" name="etude" /></label>
    </div>
  <br> <center> <button class = "btn-block"  type="submit" >Valider </center>
</form>
</div>


<?php
if(isset($_POST) AND !empty($_POST))
				{
					//Connexion a la base de données
					try
					{
						$bdd = new PDO('mysql:host=localhost;dbname=colocation;charset=utf8', 'root', '');
					}
					catch (Exception $e)
					{
					        die('Erreur : ' . $e->getMessage());
					}

					//on verifie que le formulaire email soit bien rempli
					if(!empty($_POST['email']) AND !empty($_POST['cemail']))
					{
						if($_POST['email'] != $_POST['cemail'])
						{
							echo "<p>L'email et l'email de confirmation ne correspondent pas </p>";
						}
						else
						{
							$mail = $_POST['email'];
							$query = $bdd->prepare('SELECT COUNT(*) AS nbr FROM etudiant WHERE email = :mail');
							$query->bindValue(':mail', $mail, PDO::PARAM_STR);
							$query->execute();
							$mail_free=($query->fetchColumn()== 0)?1:0;
							$query->CloseCursor();

							if(!$mail_free)
								echo "<p>Adresse mail deja utilisée</p>";
						}

					}

					if($_POST['email'] == $_POST['cemail'])
					{
						try
						{
							$bdd = new PDO('mysql:host=localhost;dbname=colocation; charset=utf8', 'root', '');
						}
						catch (Exception $e)
						{
						        die('Erreur : ' . $e->getMessage());
						}

						$mail = strtolower($_POST['email']);
						$cmail = strtolower($_POST['cemail']);
						$pass = $_POST['password'];
						$nom = strtoupper($_POST['nom']);
						$prenom = $_POST['prenom'];
						$tel = $_POST['tel'];
						$ecole = $_POST['ecole'];
						$etude = $_POST['etude'];

						$reqMail = $bdd->query('SELECT email FROM etudiant WHERE email LIKE "'.$mail.'"');

						while($donnee = $reqMail->fetch())
						{
							if($donnee['email'] = $mail)
							{
								echo "Mail deja utilisé";
								$mailUtilise = true	;
							}
						}

						if(!isset($mailUtilise))
						{
						$req = $bdd->prepare('INSERT INTO etudiant VALUES (:email, cemail, :password, :nom, :prenom, :tel, :etude, :ecole)');

						$req->execute(array(
							'email' => $mail,
							'cemail'=>$cemail,
							'password' => $pass,
							'nom' => $nom,
							'prenom' => $prenom,
							'tel' => $tel,
							'ecole' => $ecole,
							'etude' => $etude
							));

						echo "<p>Inscription validée</p>";
						}
					
					}
				}

	
	?>
		<footer  class="container-fluid bg-4 text-center">
			  <p>Projet du site de colocation  SIO-ILEC 2017</p>
		</footer>
	</body>
</html>

