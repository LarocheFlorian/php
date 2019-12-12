<h1>Detail de la citation</h1>


	<?php

  $db = new Mypdo();
	$manager = new CitationManager($db);
	$InfoCitations = $manager->getInfo($_GET["numero"]);

  ?>

<<<<<<< HEAD
<img src="./image/enseignant/Thierrry Monediere.png">
<label><?php echo $InfoCitations->getCitLibelle(); ?> </label><br>
<label><?php echo $InfoCitations->getCitNomEnseignant(); ?></label><br>
=======
<img src="./image/enseignant/Thierrry Monediere.png" id="imageProfil">
<label>C'est plus fort que toi </label><br>
<label>Thierrry Monediere</label><br>
>>>>>>> 96eb5338a9c2b69eba97fdafc4d335628bb94f9b





Note : <?php echo $InfoCitations->getCitMoyenne(); ?>/20 <br>

Vous avez deja noter <br>
