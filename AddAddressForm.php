<?php
	if(isset($_GET['mail'])) {
		$mail = $_GET['mail'];

		echo "
			<h3 class=\"sidebar-title\">Ajout d'une adresse</h3>
			<form action=\"addDataAddress.php\" method=\"GET\">
				<div class=\"form-group col-md-6\">
					<input type=\"text\" class=\"form-control\" name=\"numero\" id=\"numero\" placeholder=\"Numéro\" required=\"required\" />
				</div>
				<div class=\"form-group col-md-6\">
	            	<input type=\"text\" class=\"form-control\" name=\"rue\" id=\"rue\" placeholder=\"Rue\" required=\"required\" />
	            </div>
	            <div class=\"form-group col-md-6\">
	            	<input type=\"mail\" class=\"form-control\" name=\"complement\" id=\"complement\" placeholder=\"Complément\" required=\"required\" />
	            </div>
	            <div class=\"form-group col-md-6\">
	            	<input type=\"text\" class=\"form-control\" name=\"ville\" id=\"ville\" placeholder=\"Ville\" required=\"required\" />
	            </div>
	            <div class=\"form-group col-md-6\">
	            	<input type=\"text\" class=\"form-control\" name=\"cp\" size=\"5\" id=\"cp\" placeholder=\"Code postal\" required=\"required\" />
	            </div>
	            <input type=\"hidden\" name=\"mail\" value=\"".$mail."\" />
	            <input type=\"submit\" class=\"pull-right\" value=\"Mettre à jour\" />
            </form>
		";
	} else {
		echo "Une erreur est survenue. Veuillez réessayer.";
	}
?>