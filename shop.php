<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/logo.png">
    <title>Boutique | BALM</title>
    
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
                        <h2>Boutique</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br/><div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="single-sidebar">
                    <h2 class="sidebar-title text-center">Rechercher des produits</h2>
                    <form action="shop.php" method="GET">
                        <input type="text" name="search" id="search" placeholder="Nom d'album, Nom de chanson, Style..." required="required" />
                        <input type="submit" class="pull-right" value="Rechercher" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row" id="products">
                <?php
                    if(isset($_GET['search'])) {
                        $search = trim(utf8_encode($_GET['search']));

                        $mysqli = new mysqli("localhost", "root", "", "BD_BALM");

                        if (mysqli_connect_errno()) {
                            echo "Echec lors de la connexion à MySQL : (" . $mysqli_connect_errno . ") " . $mysqli_connect_error;
                        }

                        $query = "SELECT DISTINCT num_Album, nom_Artiste, nom_Album, nom_Style, prix FROM Artiste Ar INNER JOIN Album Al ON Ar.num_Artiste = Al.id_Artiste 
                            INNER JOIN Style S ON S.num_Style = Al.id_Style 
                            INNER JOIN Chanson C ON Al.num_Album = C.id_Album
                            WHERE Ar.nom_Artiste LIKE '%".$search."%'
                            OR Al.nom_Album LIKE '%".$search."%'
                            OR S.nom_Style LIKE '%".$search."%'
                            OR C.nom_Chanson LIKE '%".$search."%'";

                        if ($rep = $mysqli->query($query)) {
                            if(mysqli_num_rows($rep) != 0) {
                                while($row = $rep->fetch_assoc()) {
                                    echo "

                                    <div class=\"col-md-3 col-sm-6\">
                                        <div class=\"single-shop-product\">
                                            <div class=\"product-upper\">
                                                <img src=\"img/".utf8_encode($row['nom_Artiste'])." - ".utf8_encode($row['nom_Album']).".jpg\">
                                            </div>
                                            <h2><a href=\"single-product.php?search=".$row['num_Album']."\">".utf8_encode($row['nom_Artiste'])."<br/>".utf8_encode($row['nom_Album'])."</a></h2>
                                            <div class=\"product-carousel-price\">
                                                <ins>".$row['prix']."€<ins>
                                            </div>  
                                    ";

                                    if(isset($_SESSION['mail'])) {
                                        echo "<div class=\"product-option-shop\">
                                                <a class=\"add_to_cart_button\" data-quantity=\"1\" data-product_sku=\"\" data-product_id=\"70\" rel=\"nofollow\" href=\"addCart.php?album=".$row['num_Album']."\">Ajouter au panier</a>
                                            </div>";
                                    }

                                    echo"
                                        </div>
                                    </div>

                                    ";
                                }
                            } else {
                                echo "<h3 class=\"text-center\">Aucun résultat ne correspond à votre recherche.</h3>";
                            }
                        }

                        $mysqli->close();
                    } else {
                        $mysqli = new mysqli("localhost", "root", "", "BD_BALM");

                        if (mysqli_connect_errno()) {
                            echo "Echec lors de la connexion à MySQL : (" . $mysqli_connect_errno . ") " . $mysqli_connect_error;
                        }

                        $query = "SELECT DISTINCT num_Album, nom_Artiste, nom_Album, nom_Style, prix FROM Artiste Ar INNER JOIN Album Al ON Ar.num_Artiste = Al.id_Artiste 
                            INNER JOIN Style S ON S.num_Style = Al.id_Style 
                            INNER JOIN Chanson C ON Al.num_Album = C.id_Album
                            ORDER BY Rand()";

                        if ($rep = $mysqli->query($query)) {
                            while($row = $rep->fetch_assoc()) {
                                echo "

                                <div class=\"col-md-3 col-sm-6\">
                                    <div class=\"single-shop-product\">
                                        <div class=\"product-upper\">
                                            <img src=\"img/".utf8_encode($row['nom_Artiste'])." - ".utf8_encode($row['nom_Album']).".jpg\" alt=\"\">
                                        </div>
                                        <h2><a href=\"single-product.php?search=".$row['num_Album']."\">".utf8_encode($row['nom_Artiste'])."<br/>".utf8_encode($row['nom_Album'])."</a></h2>
                                        <div class=\"product-carousel-price\">
                                            <ins>".$row['prix']."€<ins>
                                        </div>
                                ";

                                if(isset($_SESSION['mail'])) {
                                    echo "<div class=\"product-option-shop\">
                                            <a class=\"add_to_cart_button\" data-product_id=\"70\" rel=\"nofollow\" href=\"addCart.php?album=".$row['num_Album']."\">Ajouter au panier</a>
                                        </div> ";
                                }
                                      
                                echo "  
                                                              
                                    </div>
                                </div>

                                ";
                            }
                        }

                        $mysqli->close();
                    }
                ?>
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