
	<h1>Valider les citations </h1>

	<?php $db = new Mypdo();
	$manager = new CitationManager($db);
	$listeCitations = $manager->getListcitationavalider();


if (empty($_GET["numero"]))
{
          ?>
        	<label>Actuellement <?php echo count($listeCitations) ?> citation(s) sont en attente de validation </label><br><br>

        	<div class="tableau">
        	<table>
        		<tr>
        			<th>Nom de l'enseignant</th>
        			<th>Libellé</th>
        			<th>Date</th>
        			<th>Valider</th>

        		</tr>

        		<?php


        		foreach ($listeCitations as $citation)
        		{ ?>
        			<tr>
        				<td><?php echo $citation->getCitNomEnseignant(); ?> </td>
        				<td><?php echo $citation->getCitLibelle(); ?> </td>
        				<td><?php echo $citation->getCitDate(); ?> </td>
        				<td><a href="index.php?page=8&numero=<?php echo $citation->getCitNum(); ?>"><img src="./image/valid.png" alt=""> </a></td>
        			</tr>
    	<?php } ?>
        	</table>
        </div>
        <?php
}else{


          $retour = $manager->setvalid($_GET["numero"], $_SESSION["Num"]);
          if ($retour == 1){
             ?>
             <img src="./image/valid.png" alt="">
             la citation a bien été validé par <?php echo $_SESSION["login"]; ?><br>
             <?php
            header("refresh:2;url=index.php");
          }
          else
          {
             echo "problème";
          }
}
?>
