<div class="header-area">
    <div class="container">
        <div class="row">
    		<?php
    			if(isset($_SESSION['mail'])) {
    		?>
            <div class="col-md-8">
                <div class="user-menu">
		            <ul>
                        <li><a href="account.php"><i class="fa fa-user"></i>Mon Compte</a></li>
                        <li><a href="cart.php"><i class="fa fa-shopping-cart"></i>Mon panier</a></li>
                        <li><a href="deconnexion.php"><i class="fa fa-user"></i>Se déconnecter</a></li>
                    </ul>
	           	</div>	
	        </div>
            <div class="col-md-4">
                <div class="header-right">
                    <ul class="list-inline" style="line-height : 35px;">
                    	<?php
                			echo "<li>Bonjour M." . $_SESSION['nom']."</li>";
                    	?>
                    </ul>
                </div>
            </div>	
            <?php
            	} else {
            ?>
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                        <li><a href="login.php"><i class="fa fa-user"></i>Se connecter</a></li>
                    </ul>
                 </div>
            </div>
            <?php
                }
            ?>
        </div>
        
    </div>
</div> <!-- End header area -->

<div class="container">
    <div class="site-branding-area">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="index.php"><span>B</span>uy <span>A</span>nd <span>L</span>isten <span>M</span>usic</a></h1>
                </div>
            </div>

            <div class="col-sm-6">
            <?php
                if(isset($_SESSION['mail'])){     
            ?>
                <div class="shopping-item">
                    <a href="cart.php">Panier<i class="fa fa-shopping-cart"></i> </a>
                </div>
            <?php
                }
            ?>
            </div>
        </div>
    </div>
</div> <!-- End site branding area -->

<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div> 
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="shop.php">Boutique</a></li>
                    <?php
                        if(isset($_SESSION['mail'])){     
                    ?>
                        <li><a href="cart.php">Panier</a></li>
                    <?php
                        }
                    ?>

                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div> 
        </div>
    </div>
</div> <!-- End mainmenu area -->
