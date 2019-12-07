
	<h1>Liste des villes</h1>


	<?php $db = new Mypdo();
	$manager = new VilleManager($db);
	$listeVilles = $manager->getList();?>



	<label>Actuellement <?php echo count($listeVilles) ?> ville(s) sont enregistrées </label><br><br>
	<div class="tableau">
	<table border="solid">
	  <tr>
	    <th>Numéro</th>
	    <th>Nom</th>
	  </tr>

	  <?php


	  foreach ($listeVilles as $ville)
	  { ?>
	    <tr>
	      <td><?php echo $ville->getVilNum(); ?> </td>
	      <td><?php echo $ville->getVilNom(); ?> </td>
	    </tr>
	  <?php } ?>
	</table>
	</div>
