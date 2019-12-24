<h1>Detail de la citation</h1>


	<?php

  $db = new Mypdo();
	$manager = new CitationManager($db);
	$personnemanager = new PersonneManager($db);

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


	<?php
	print_r($_SESSION);
	if ($personnemanager->aVoter($_GET["numero"],$_SESSION["Num"]))
	{
		echo "ca marche"; ?>
	<?php }else {
		echo "ca marche pas";
	} ?>
</div>
