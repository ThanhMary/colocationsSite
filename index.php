<?php
  session_start();
?>

<!Doctype html>
<html lang="fr">
	<head>
	<meta charset="utf-8">
		<title>Site de colocation</title>
			
			<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
			<link rel="stylesheet" type="text/css" href="css/style.css">
	


			<script src="js/jquery-3.2.1.js"></script>
			<script src="js/bootstrap.js"></script>
	</head>

<body>

	<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
           <center><h1>ILEC-COLOCATION</h1></center>
		   <div class="container-fluid bg-2 text-center">
				<ul class="nav navbar-nav">
					<li><a href="proposeLocation.php">Je propose une location</a></li>
					<li><a href="afficherAnnonce.php">Je cherche une location</a></li>
				</ul>
        <?php
				if(isset($_SESSION) && !empty($_SESSION))
				{?>
				  <ul class="nav navbar-nav navbar-right">
					<li></a> <a href="deconnection.php">Deconnection</a></li>
				  </ul>

				<?php
						}
						else
						{
						?>
								<ul class="nav navbar-nav navbar-right">
								  <li><a href="inscription.php">Inscription</a></li>
								  <li> <a href="connection.php">Connexion</a></li>
								</ul>
						<?php
					};
        ?>
</div>
		</nav>
</div>

<?php
  if(isset($_SESSION) AND !empty($_SESSION))
  {
    echo '<h2><center><p> BIENVENU '. strtoupper($_SESSION['prenom']) . '</p></center></h2>';
  }  ?>

<!-- premier container-->
<div class="container">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicateurs -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
	  <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
	  <li data-target="#myCarousel" data-slide-to="5"></li>
    </ol>

    <!-- Pour les slides carousels -->
    <div class="carousel-inner">
      <div class="item active">
        <img class="img-responsive" src="photos/co1.jpg">
      </div>
      <div class="item">
        <img class="img-responsive" src="photos/co2.jpg">
      </div>
      <div class="item">
        <img class="img-responsive" src="photos/co3.jpg">
      </div>
	  <div class="item">
        <img class="img-responsive" src="photos/co4.jpg">
      </div>
	  <div class="item">
        <img class="img-responsive" src="photos/co5.jpg">
      </div>
	  <div class="item">
        <img class="img-responsive" src="photos/co6.jpg">
      </div>
    </div>


    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


<!-- deuxième Container -->
<div class="container">


<footer class="container-fluid bg-4 text-center">
<div class="container-fluid bg-2 text-center">
  <h1 class="margin">C'EST COOL!</h1>
 </div>
  <p><h2>Projet de colocation  SIO-ILEC 2017</h2></p>
</footer>
</div>
</body>

</html>
