<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img\logo.png">
    <title>Accueil | BALM</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
  </head>
  <body>    
    <?php include("header.php") ?>

    <div class="slider-area">
        <div class="zigzag-bottom"></div>
        <div id="slide-list" class="carousel carousel-fade slide" data-ride="carousel">

            <div class="slide-bulletz">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ol class="carousel-indicators slide-indicators">
                                <li data-target="#slide-list" data-slide-to="0" class="active"></li>
                                <li data-target="#slide-list" data-slide-to="1"></li>
                                <li data-target="#slide-list" data-slide-to="2"></li>
                            </ol>                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="single-slide">
                        <div class="slide-bg slide-one"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>Composez la bande son de votre vie</h2>
                                                <p>Vous aimez la musique ? Vous avez envie de renouveler votre playlist musicale ? </p>
                                                <p>Alors offrez-vous les plus grands titres d'hier et d'aujourd'hui avec nos meilleures ventes musicales du moment ! Que vous aimiez le métal ou la pop, nous avons votre style préféré, il suffit de cliquer ! </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-slide">
                        <div class="slide-bg slide-two"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>Laissez-vous surprendre par la musique</h2>
												<p>Un site ergonomique pour retrouver tous les styles et tous les titres que vous aimez !</p>
                                                <p>Acheter les albums de votre choix en très haute qualité. Il vous suffit de rechercher la musique souhaitée et de cliquer sur "ajouter au panier".</p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-slide">
                        <div class="slide-bg slide-three"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>Le son coule dans nos veines</h2>
                                                <p>La musique est la langue des émotions car la musique est au delà des mots. La musique adoucit les moeurs.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>        
    </div> <!-- End slider area -->
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-refresh"></i>
                        <p>Retour sous 30 jours</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-truck"></i>
                        <p>Livraison gratuite</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-lock"></i>
                        <p>Paiement sécurisé</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-gift"></i>
                        <p>Nouveaux produits</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Produits aléatoires</h2>
                        <div class="product-carousel">
						<?php
							$mysqli = new mysqli("localhost", "root", "", "BD_BALM");

							if (mysqli_connect_errno()) {
								echo "Echec lors de la connexion à MySQL : (" . $mysqli_connect_errno . ") " . $mysqli_connect_error;
							}

							$query = "SELECT DISTINCT num_Album, nom_Artiste, nom_Album, nom_Style, prix FROM Artiste Ar INNER JOIN Album Al ON Ar.num_Artiste = Al.id_Artiste 
								  INNER JOIN Style S ON S.num_Style = Al.id_Style 
								  INNER JOIN Chanson C ON Al.num_Album = C.id_Album
								  ORDER BY Rand()
								  LIMIT 10";

							if ($rep = $mysqli->query($query)) {
								if(mysqli_num_rows($rep) != 0) {
									while($row = $rep->fetch_assoc()) {
										echo"

                                            <div class=\"single-product\">
												<div class=\"product-f-image\">
													<img src=\"img/".utf8_encode($row['nom_Artiste']). " - " .utf8_encode($row['nom_Album']).".jpg\" alt=\"\">
													<div class=\"product-hover\">
														<a href=\"single-product.php?search=".$row['num_Album']."\" class=\"view-details-link\"><i class=\"fa fa-link\"></i>Détails</a>
													</div>
												</div>
												
												<h2><a href=\"single-product.php?search=".$row['num_Album']."\">".utf8_encode($row['nom_Artiste']). " - " .utf8_encode($row['nom_Album'])."</a></h2>
												
												<div class=\"product-carousel-price\">
													<ins>".$row['prix']."€</ins>
												</div> 
                                                </div>
											
                                        ";
									}
								}
						 	}
					    ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->

    <?php include("footer.php") ?>

    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
</body>
</html>