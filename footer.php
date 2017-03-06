
    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2><span>BALM</span></h2>
                        <p>Vous aimez la musique ? Vous avez envie de renouveler votre playlist musicale ? Alors offrez-vous les plus grands titres d'hier et d'aujourd'hui avec nos meilleures ventes musicales du moment ! Que vous aimiez le métal ou la pop, nous avons votre style préféré, il suffit de cliquer ! </p>
                        <p>BALM : votre meilleur partenaire pour une playlist musicale adaptée à vos goûts !</p>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Navigation</h2>
                        <ul>
                            <li><a href="index.php">Accueil</a></li>
                            <li><a href="shop.php">Boutique</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Styles</h2>
                        <?php
                            $mysqli = new mysqli("localhost", "root", "", "BD_BALM");

                            if (mysqli_connect_errno()) {
                                echo "Echec lors de la connexion à MySQL : (" . $mysqli_connect_errno . ") " . $mysqli_connect_error;
                            }

                            $queryStyle = "SELECT nom_Style FROM Style ORDER BY Rand() LIMIT 4";

                            if ($repStyle = $mysqli->query($queryStyle)) {
                                if(mysqli_num_rows($repStyle) != 0) {
                                    while($row0 = $repStyle->fetch_assoc()) {
                                        echo"
                                            <ul>
                                                <li><a href=\"shop.php?search=\">".utf8_encode($row0['nom_Style'])."</a></li>
                                            </ul>                        
                                         "; 
                                    }
                                }
                            }

                            $mysqli->close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2015 BALM. All Rights Reserved. Coded with <i class="fa fa-heart"></i> by J. FONCK & C. BARBE</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
