<h1>Detail de la citation</h1>


	<?php

  $db = new Mypdo();
	$manager = new CitationManager($db);
	$InfoCitations = $manager->getInfo($_GET["numero"]);

  ?>

<img src="./image/enseignant/Thierrry Monediere.png">
<label><?php echo $InfoCitations->getCitLibelle(); ?> </label><br>
<label><?php echo $InfoCitations->getCitNomEnseignant(); ?></label><br>





Note : <?php echo $InfoCitations->getCitMoyenne(); ?>/20 <br>

Vous avez deja noter <br>
