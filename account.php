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
    <title>Mon compte | BALM</title>
    
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
    <script type="text/javascript">
      function updateDataPerso(mail) {
        var req = null;

        if (window.XMLHttpRequest) {
          req = new XMLHttpRequest();

        } else if (window.ActiveXObject) {
          try {
            req = new ActiveXObject("Msxml2.XMLHTTP");
          } catch (e) {
            try {
              req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {}
          }
        }

        req.onreadystatechange = function() {
          if(req.readyState == 4) {
            if(req.status == 200) {
              document.getElementById("updateData").innerHTML = req.responseText;
            }
          } 
        };
        
        req.open("GET", "dataPersoForm.php?mail="+mail, true);
        req.send(null);
      }

      function updateDataAddress(address) {
        var req = null;

        if (window.XMLHttpRequest) {
          req = new XMLHttpRequest();

        } else if (window.ActiveXObject) {
          try {
            req = new ActiveXObject("Msxml2.XMLHTTP");
          } catch (e) {
            try {
              req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {}
          }
        }

        req.onreadystatechange = function() {
          if(req.readyState == 4) {
            if(req.status == 200) {
              document.getElementById("updateData").innerHTML = req.responseText;
            }
          } 
        };
        
        req.open("GET", "dataAddressForm.php?address="+address, true);
        req.send(null);
      }

      function deleteDataAddress(address) {
        var req = null;

        if (window.XMLHttpRequest) {
          req = new XMLHttpRequest();

        } else if (window.ActiveXObject) {
          try {
            req = new ActiveXObject("Msxml2.XMLHTTP");
          } catch (e) {
            try {
              req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {}
          }
        }

        req.onreadystatechange = function() {
          if(req.readyState == 4) {
            if(req.status == 200) {
              document.getElementById("updateData").innerHTML = req.responseText;
            }
          } 
        };
        
        req.open("GET", "deleteAddressConfirm.php?address="+address, true);
        req.send(null);
      }

      function deleteDataAddress(address) {
        var req = null;

        if (window.XMLHttpRequest) {
          req = new XMLHttpRequest();

        } else if (window.ActiveXObject) {
          try {
            req = new ActiveXObject("Msxml2.XMLHTTP");
          } catch (e) {
            try {
              req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {}
          }
        }

        req.onreadystatechange = function() {
          if(req.readyState == 4) {
            if(req.status == 200) {
              document.getElementById("updateData").innerHTML = req.responseText;
            }
          } 
        };
        
        req.open("GET", "deleteAddressConfirm.php?address="+address, true);
        req.send(null);
      }

      function addAddress(mail) {
        var req = null;

        if (window.XMLHttpRequest) {
          req = new XMLHttpRequest();

        } else if (window.ActiveXObject) {
          try {
            req = new ActiveXObject("Msxml2.XMLHTTP");
          } catch (e) {
            try {
              req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {}
          }
        }

        req.onreadystatechange = function() {
          if(req.readyState == 4) {
            if(req.status == 200) {
              document.getElementById("updateData").innerHTML = req.responseText;
            }
          } 
        };
        
        req.open("GET", "addAddressForm.php?mail="+mail, true);
        req.send(null);
      }
    </script>
  </head>
  <body OnLoad="updateDataPerso('<?php echo $_SESSION['mail']; ?>')">
    <?php include("header.php") ?>
    
     <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Mon compte</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <div class="row">
                <div class="col-sm-10">
                  <h3 class="sidebar-title">Informations personnelles :</h3>
                  <?php
                    $mysqli = new mysqli("localhost", "root", "", "BD_BALM");

                    if (mysqli_connect_errno()) {
                        echo "Echec lors de la connexion à MySQL : (" . $mysqli_connect_errno . ") " . $mysqli_connect_error;
                    }

                    $query = "SELECT * FROM Client C WHERE mail='".$_SESSION['mail']."'";

                    if ($rep = $mysqli->query($query)) {
                        if($row = $rep->fetch_assoc()) {
                            echo "
                              <p>Nom : ".$row['nom_Client']."<br/>
                              Prénom : ".$row['prenom_Client']."<br/>
                              Mail : ".$row['mail']."<br/>
                              Téléphone : ".$row['tel']."<br/><br/>
                            ";

                            echo "
                              <table class=\"pull-right\">
                              <tr><td><button type=\"button\" class=\"btn btn-default\" OnClick=\"updateDataPerso('".$row['mail']."')\">Modifier</button></td></tr>
                              </table></p>
                            ";
                        } else {
                            echo "Erreur avec la base de données.";
                        }
                    }
                  ?>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-10">
                  <h3 class="sidebar-title">Adresse(s) :</h3>
                  <button type="button" class="btn btn-default pull-right" OnClick="addAddress('<?php echo $_SESSION['mail'] ?>')">Ajouter une adresse</button>
                  <?php
                    $query = "SELECT * FROM Client C INNER JOIN Adresse A ON C.num_Client = A.id_Client
                      WHERE mail='".$_SESSION['mail']."'";

                    if ($rep = $mysqli->query($query)) {
                      if($rep->num_rows != 0) {
                        while($row = $rep->fetch_assoc()) {
                            echo "
                              <p>Numéro : ".$row['numero']."<br/>
                              Rue : ".$row['rue']."<br/>
                              ";

                            if($row['complement'] != "") {
                              echo "Complément : ".$row['complement']."<br/>";
                            }

                            echo "  
                              Ville : ".$row['ville']."<br/>
                              Code postal : ".$row['cp']."
                            ";

                            echo "
                              <table class=\"pull-right\">
                              <tr><td><button type=\"button\" class=\"btn btn-default\" OnClick=\"updateDataAddress(".$row['num_Adresse'].")\">Modifier</button></td>
                              <td><button type=\"button\" class=\"btn btn-default\" OnClick=\"deleteDataAddress(".$row['num_Adresse'].")\">Supprimer</button></td></tr>
                              </table></p><br/><br/>
                            ";
                        } 
                      } else {
                        echo "Vous n'avez enregistré aucune adresse.";
                      }
                    } else {
                      echo "Erreur avec la base de données.";
                    }

                    $mysqli->close();                  
                  ?>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-10">
                  <br/><h3 class="sidebar-title">Modifier votre mot de passe :</h3>
                  <form action="updateDataPass.php" method="POST">
                    <div class="form-group col-md-6">
                      <input type="password" class="form-control" name="pass1" id="pass1" placeholder="Mot de passe" required="required"/>
                    </div>
                    <div class="form-group col-md-6">
                      <input type="password" class="form-control" name="pass2" id="pass2" placeholder="Répéter votre mot de passe" required="required"/>
                    </div>
                    <input type="submit" class="btn btn-default pull-right" value="Modifier">
                  </form>
                </div>
              </div>
            </div>
            <div class="col-sm-6" id="updateData">
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