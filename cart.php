<?php
    session_start();

    if(!isset($_SESSION['mail'])) {
        header("Location:index.php");
        exit();
    }
?>

<!DOCTYPE HTML>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/logo.png">
    <title>Panier | BALM</title>
    
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
                        <h2>Panier</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->

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
                    
                    <?php
    					$mysqli = new mysqli("localhost", "root", "", "BD_BALM");

    					if (mysqli_connect_errno()) {
    						echo "Echec lors de la connexion à MySQL : (" . $mysqli_connect_errno . ") " . $mysqli_connect_error;
    					}

    					$query = "SELECT DISTINCT num_Album, nom_Artiste, nom_Album, nom_Style, prix FROM Artiste Ar INNER JOIN Album Al ON Ar.num_Artiste = Al.id_Artiste 
    						  INNER JOIN Style S ON S.num_Style = Al.id_Style 
    						  INNER JOIN Chanson C ON Al.num_Album = C.id_Album
    						  ORDER BY Rand()
                              LIMIT 4";

    					if ($rep = $mysqli->query($query)) {
    						if(mysqli_num_rows($rep) != 0) {
    							while($row = $rep->fetch_assoc()) {
    								echo"
    								<div class=\"thubmnail-recent\">
    								    <img src=\"img/".utf8_encode($row['nom_Artiste'])." - ".utf8_encode($row['nom_Album']).".jpg\" class=\"recent-thumb\">
    								    <h2><a href=\"single-product.php?search=".$row['num_Album']."\">".utf8_encode($row['nom_Album']). " - " .utf8_encode($row['nom_Artiste'])."</a></h2>
    								    <div class=\"product-sidebar-price\">
    									<ins>".$row['prix']."€</ins>
    								    </div>
    								</div>
    			                     "; 
                                }
                            }
                        }
                    ?>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                        <?php
                            if(count($_SESSION['identifiant']) == 0) {
                                echo "<h1 class=\"text-center\">Votre panier est tristement vide :(</h1>";
                            } else {
                                 echo "
                                    <form action=\"valideCart.php\" method=\"POST\">
                                        <table cellspacing=\"0\" class=\"shop_table cart\">
                                            <thead>
                                                <tr>
                                                    <th class=\"product-remove\">&nbsp;</th>
                                                    <th class=\"product-thumbnail\">Jaquette</th>
                                                    <th class=\"product-name\">Article</th>
                                                    <th class=\"product-price\">Prix</th>
                                                </tr>
                                            </thead>
                                            <tbody>";

                                $prixTotal = 0;
                                for($i = 0; $i < count($_SESSION['identifiant']); $i++) {
                                    $queryCart = "SELECT num_Album, nom_Album, nom_Artiste, prix FROM Artiste Ar INNER JOIN Album Al ON Ar.num_Artiste = Al.id_Artiste
                                    WHERE num_Album=".$_SESSION['identifiant'][$i];
                                    
                                    if($rep = $mysqli->query($queryCart)) {
                                        while($row = $rep->fetch_assoc()) {
                                            echo "
                                                <tr class=\"cart_item\">
                                                    <td class=\"product-remove\">
                                                        <a title=\"Supprimer\" class=\"remove\" href=\"suppressionPanier.php?album=".$row['num_Album']."\">×</a> 
                                                    </td>

                                                    <td class=\"product-thumbnail\">
                                                        <a href=\"single-product.php?search=".utf8_encode($row['num_Album'])."\"><img width=\"145\" height=\"145\" class=\"shop_thumbnail\" src=\"img/".utf8_encode($row['nom_Artiste'])." - ".utf8_encode($row['nom_Album']).".jpg\"></a>
                                                    </td>

                                                    <td class=\"product-name\">
                                                        <a href=\"single-product.php?search=".utf8_encode($row['num_Album'])."\">".utf8_encode($row['nom_Artiste'])." - ".utf8_encode($row['nom_Album'])."</a> 
                                                    </td>

                                                    <td class=\"product-price\">
                                                        <span class=\"amount\">".$row['prix']."€</span>
                                                    </td>
                                                </tr>";

                                                $prixTotal += $row['prix'];
                                        }
                                    }
                                }

                                echo "
                                                <tr>
                                                    <td class=\"actions\" colspan=\"6\">
                                                        <input type=\"hidden\" name=\"send\" value=\"send\">
                                                        <input type=\"submit\" value=\"Valider mon panier\" class=\"button\">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>";

                                echo "
                                <div class=\"cart-collaterals\">
                                    <div class=\"cart_totals \">
                                        <h2>Total du panier</h2>

                                        <table cellspacing=\"0\">
                                            <tbody>
                                                <tr class=\"order-total\">
                                                    <th>Total du panier</th>
                                                    <td><strong><span class=\"amount\">".$prixTotal."€</span></strong> </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>";
                            }
                            $mysqli->close();
                        ?>

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
