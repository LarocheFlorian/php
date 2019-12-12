<h1>Detail de la citation</h1>


	<?php

  $db = new Mypdo();
	$manager = new CitationManager($db);
	$InfoCitations = $manager->getInfo($_GET["numero"]);

  ?>

<<<<<<< HEAD

<img src="./image/enseignant/Thierrry Monediere.png" id="imageProfil">
=======
<img src="./image/enseignant/Thierrry Monediere.png">
>>>>>>> c77ab9fa47de85a8d08f6735a0100b6fb6b3d498
<label><?php echo $InfoCitations->getCitLibelle(); ?> </label><br>
<label><?php echo $InfoCitations->getCitNomEnseignant(); ?></label><br>





Note : <?php echo $InfoCitations->getCitMoyenne(); ?>/20 <br>

Vous avez deja noter <br>
