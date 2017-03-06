<?php
    session_start();

    if(!isset($_GET['search'])) {
	   header("Location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/logo.png">
    <title>Détails | BALM</title>
    
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
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Détails</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Rechercher des produits</h2>
                        <form action="shop.php" method="GET">
                            <input type="text" name="search" id="search" placeholder="Nom d'album, Nom de chanson, Style..." required="required" />
                            <input type="submit" class="pull-right" value="Chercher" />
                        </form>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Autres albums</h2>
            			<?php
            				if(isset($_GET['search'])) {
            					$search = $_GET['search'];

            					$mysqli = new mysqli("localhost", "root", "", "BD_BALM");

            					if (mysqli_connect_errno()) {
            						echo "Echec lors de la connexion à MySQL : (" . $mysqli_connect_errno . ") " . $mysqli_connect_error;
            					}

            					$query0 = "SELECT DISTINCT num_Album, nom_Artiste, nom_Album, prix FROM Artiste Ar INNER JOIN Album Al ON Ar.num_Artiste = Al.id_Artiste 
            						  INNER JOIN Style S ON S.num_Style = Al.id_Style 
            						  INNER JOIN Chanson C ON Al.num_Album = C.id_Album
            						  ORDER BY Rand()
                                      LIMIT 4";

            					if ($rep0 = $mysqli->query($query0)) {
            						if($rep0->num_rows != 0) {
            							while($row0 = $rep0->fetch_assoc()) {
            								echo"
            								<div class=\"thubmnail-recent\">
            								    <img src=\"img/".utf8_encode($row0['nom_Artiste'])." - ".utf8_encode($row0['nom_Album']).".jpg\" class=\"recent-thumb\" alt=\"\">
            								    <h2><a href=\"single-product.php?search=".$row0['num_Album']."\">".utf8_encode($row0['nom_Album']). " - " .utf8_encode($row0['nom_Artiste'])."</a></h2>
            								    <div class=\"product-sidebar-price\">
            									<ins>".$row0['prix']."€</ins>
            								    </div>                             
            								</div>";
                                        }
                                    }
                                }
            			?>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    
							<?php
									$query = "SELECT DISTINCT nom_Artiste, nom_Album, num_Album, nom_Style, prix, sortie
										FROM Artiste Ar INNER JOIN Album Al ON Ar.num_Artiste = Al.id_Artiste 
										INNER JOIN Style S ON S.num_Style = Al.id_Style 
										WHERE num_Album = '".$search."'";

									if ($rep = $mysqli->query($query)) {
										if($rep->num_rows != 0) {
											if($row = $rep->fetch_assoc()) {
							?>
                        				<div class="product-main-img">
                                            <?php
                                                echo "<img src=\"img/".utf8_encode($row['nom_Artiste'])." - ".utf8_encode($row['nom_Album']).".jpg\">";        
                                            ?>
                                    
                                </div>
                            </div>
                        </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name">
									<?php 
										echo "<p>" . utf8_encode($row['nom_Artiste'])." - ".utf8_encode($row['nom_Album']). "</p> <p>" . $row['sortie'] . "</p>";
									?>	
									</h2>
                                    <div class="product-inner-price">
                                        <ins>
										<?php 
										    echo $row['prix']."€";
										?>
										</ins>
                                    </div>    
                                    
                                   <?php
                                        if(isset($_SESSION['mail'])) {
                                    ?>

                                    <form action="addCart.php" class="cart">
                                        <input type="hidden" name="album" value="<?php echo $row['num_Album'] ?>" />
                                        <button class="add_to_cart_button" type="submit">Ajouter au panier</button>
                                    </form>

                                    <?php
                                        } else {
                                    ?>

                                    <form action="login.php" class="cart">
                                        <button class="btn btn-default" type="submit">Se connecter</button>  
                                    </form>

                                    <?php
                                        }
                                    ?>
                                    
                                    <div class="product-inner-category">
                                        <p>Style : <a href="shop.php?search=<?php echo utf8_encode($row["nom_Style"]) ?>">
										<?php 
											echo utf8_encode($row['nom_Style']);
											}
										}
									}
										?>	
										</a></p>
                                    </div> 
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Chansons</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Chansons</h2>  
                                                <?php
													$queryChanson = "SELECT DISTINCT nom_Chanson, duree
													FROM Album A INNER JOIN Chanson C ON A.num_Album = C.id_Album
													WHERE num_Album = '".$search."'";
													
													if ($queryChanson = $mysqli->query($queryChanson)) {
														if($queryChanson->num_rows != 0) {
															$compteur = 1;
															while($row2 = $queryChanson->fetch_assoc()) {
																echo "<p>" . $compteur . " - " . utf8_encode($row2['nom_Chanson']) . " - " . $row2['duree'] . "</p>" ; 
																$compteur++;
															}
														}
													}
								                }				
                                            ?>
												
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
    </div>

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