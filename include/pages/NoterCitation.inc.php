<h1>Detail de la citation</h1>


	<?php

  $db = new Mypdo();
	$manager = new CitationManager($db);
	$InfoCitations = $manager->getInfo($_GET["numero"]);

  ?>

<<<<<<< HEAD

<img src="./image/enseignant/Thierrry Monediere.png" id="imageProfil">
<label><?php echo $InfoCitations->getCitLibelle(); ?> </label><br>
<label><?php echo $InfoCitations->getCitNomEnseignant(); ?></label><br>


=======
<div id="bloc">
<div id=gauche>
<img src="./image/enseignant/Thierrry Monediere.png" id="imageProfil">
</div>
<div id="droite">
>>>>>>> 0f8512cd51c4bdbc6aa4bc0f6d56b31170df6e60

		<p id="citation"><?php echo $InfoCitations->getCitLibelle(); ?> </p><br>
</div>
		<p id="para">De <?php echo $InfoCitations->getCitNomEnseignant(); ?> le <?php echo $InfoCitations->getCitDate()?></p><br>


<<<<<<< HEAD
Note : <?php echo $InfoCitations->getCitMoyenne(); ?>/20 
=======
	Note : <?php echo $InfoCitations->getCitMoyenne(); ?>/20 <br>
>>>>>>> 0f8512cd51c4bdbc6aa4bc0f6d56b31170df6e60

	Vous avez deja noter <br>
</div>
