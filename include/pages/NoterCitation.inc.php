<h1>Detail de la citation</h1>


	<?php

  $db = new Mypdo();
	$manager = new CitationManager($db);
	$InfoCitations = $manager->getInfo($_GET["numero"]);

  ?>

<div id="bloc">
<div id=gauche>
<img src="./image/enseignant/Thierrry Monediere.png" id="imageProfil">
</div>
<div id="droite">

		<p id="citation"><?php echo $InfoCitations->getCitLibelle(); ?> </p><br>
</div>
		<p id="para">De <?php echo $InfoCitations->getCitNomEnseignant(); ?> le <?php echo $InfoCitations->getCitDate()?></p><br>


	Note : <?php echo $InfoCitations->getCitMoyenne(); ?>/20 <br>

	Vous avez deja noter <br>
</div>
