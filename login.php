<?php
  session_start();

  if(isset($_SESSION['mail'])) {
      header("Location:index.php");
      exit();
  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/logo.png">
  <title>Contact | BALM</title>

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
                      <h2>Connexion</h2>
                  </div>
              </div>
          </div>
      </div>
    </div>

    <section>
      <div class="container">
        <div class="row">
          <div id="info">
            <?php
              if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email2']) && isset($_POST['tel']) && isset($_POST['pass2']) && isset($_POST['pass3']) && isset($_POST['num']) && isset($_POST['rue']) && isset($_POST['codepostal']) && isset($_POST['ville'])) {
                if(md5($_POST['pass2']) == md5($_POST['pass3'])) {
                    $nom = trim($_POST['nom']);
                    $prenom = trim($_POST['prenom']);
                    $mail = trim($_POST['email2']);
                    $tel = trim($_POST['tel']);
                    $password = md5($_POST['pass2']);
                    $numeroAdresse = trim($_POST['num']);
                    $rue = trim($_POST['rue']);
                    $cp = trim($_POST['codepostal']);
                    $ville = trim($_POST['ville']);
                    
                    $mysqli = new mysqli("localhost", "root", "", "bd_balm");

                    if (mysqli_connect_errno()) {
                        echo "Echec lors de la connexion à MySQL : (" . $mysqli_connect_errno . ") " . $mysqli_connect_error;
                    }

                    $verifMail = "SELECT num_Client FROM Client WHERE mail='".$mail."'";
                        
                    if ($rep = $mysqli->query($verifMail)) {
                        if($rep->num_rows != 0) {
                            echo "<h3 class=\"text-center\">Mail déjà utlisé par un compte.</h3>";
                        } else {
                            $newAccount = "INSERT INTO Client(nom_Client, prenom_Client, mail, tel, password) VALUES('".$nom."', '".$prenom."', '".$mail."', '".$tel."', '".$password."')";
                            if ($mysqli->query($newAccount)) {
                                echo "<h3 class=\"text-center\">Création de compte réussi. Vous pouvez vous connecter.</h3>";
                            } else {
                              echo "<h3 class=\"text-center\">Echec de la création de compte.</h3>";
                            }
                            
                            $mysqli->close();
                        }
                    }
                } else {
                    echo "<h3 class=\"text-center\">Mots de passe différents. Veuillez réessayer.</h3>";
                }
              }
            ?>
          </div>
        </div>
      </div>
    </div>

    <section id="form">
      <div class="container">
        <div class="row">
          <div class="col-sm-4 col-sm-offset-1">
            <div id="login-form-wrap">
              <h2 class="sidebar-title">Se connecter</h2>
              <form action="connexion.php" method="POST">
                <input type="email" name="email" id="email" placeholder="Email" required="required" />
                <input type="password" name="pass" id="pass" placeholder="Mot de passe" required="required /"><br/>
                <button type="submit" class="btn btn-default">Login</button>
              </form>
            </div>
          </div>
          <div class="col-sm-1">
            <h2 class="or">OR</h2>
          </div>
          <div class="col-sm-4">
            <div id="login-form-wrap">
              <h2 class="sidebar-title">Pas encore de compte ?</h2>
              <form action="login.php" method="POST">
                <h3>Informations personnelles :</h3>
                <input type="text" name="nom" id="nom" name="nom" placeholder="Nom" required="required" />
                <input type="text" name="prenom" id="prenom" placeholder="Prénom" required="required" />
                <input type="email" name="email2" id="email2" placeholder="Email" required="required" />
                <input type="text" name="tel" id="tel" placeholder="Numéro de téléphone" required="required" />
                <input type="password" name="pass2" id="pass2" placeholder="Mot de passe" required="required" />
                <input type="password" name="pass3" id="pass3" placeholder="Répéter votre votre de passe" required="required"/><br/>

                <h3>Adresse :</h3>
                <input type="text" name="num" id="num" placeholder="Numéro" required="required"/>
                <input type="text" name="rue" id="rue" placeholder="Rue" required="required"/>
                <input type="text" name="complement" id="complement" placeholder="Complement" />
                <input type="text" name="codepostal" id="codepostal" placeholder="Code postal" required="required"/>
                <input type="text" name="ville" id="ville" placeholder="Ville" required="required"/><br/>
                <button type="submit" class="btn btn-default">S'enregistrer</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php include("footer.php"); ?>
  </body>
</html>
