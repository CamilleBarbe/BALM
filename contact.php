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
                        <h2>Contact</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-sm-12 text-center">
          <?php
            if(isset($_POST['nom']) && isset($_POST['mail']) && isset($_POST['sujet']) && isset($_POST['message'])) {
              echo "<br/>";

                $name = @trim(stripslashes($_POST['nom']));
                $email = @trim(stripslashes($_POST['mail'])); 
                $subject = @trim(stripslashes($_POST['sujet'])); 
                $message = @trim(stripslashes($_POST['message']));

                $email_from = $email;
                $email_to = 'raphalle@hotmail.fr';

                $body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;

                $success = @mail($email_to, $subject, $body, 'From: <'.$email_from.'>');

                if($success) {
                  echo "<h4>Message envoyé avec succès.</h4>";
                } else {
                  echo "<h4>Erreur d'envoie du message. Veuillez réessayer.</h4>";
                }
            }
          ?>
        </div>
      </div>
      <div class="row"><br/>
        <div class="col-sm-8">
            <div class="contact-form">
              <h2 class="sidebar-title text-center">Contactez-nous</h2>
              <div class="status alert alert-success" style="display: none"></div>
              <form id="main-contact-form" class="contact-form row" name="contact-form" action="contact.php" method="post">
                    <div class="form-group col-md-6">
                        <input type="text" name="nom" class="form-control" required="required" placeholder="Nom">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" name="mail" class="form-control" required="required" placeholder="Email">
                    </div>
                    <div class="form-group col-md-12">
                        <input type="text" name="sujet" class="form-control" required="required" placeholder="Sujet">
                    </div>
                    <div class="form-group col-md-12">
                        <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Votre message..."></textarea>
                    </div>                        
                    <div class="form-group col-md-12">
                        <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                    </div>
                </form>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="contact-info">
              <h2 class="sidebar-title text-center">Informations</h2>
              <address>
                <p>BALM Inc.</p>
                <p>2231 Avenue du Général de Gaulle</p>
                <p>35000, Rennes FRANCE</p>
                <p>Mobile: 07 09 90 88 88</p>
                <p>Fax: 1-714-252-0026</p>
                <p>Email: info@balm.com</p>
              </address>
            </div>
          </div>
      </div>
    </div>

   <?php include("footer.php"); ?>
  </body>
</html>
