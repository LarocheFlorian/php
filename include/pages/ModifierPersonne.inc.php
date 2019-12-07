
	<h1>Modifier une personne enregistrées</h1>


	<?php
	$db = new Mypdo();
	$manager = new PersonneManager($db);
	$listePersonne = $manager->getList();

	if (empty($_GET["numero"]))
	{
	 ?>

		<label>Actuellement <?php echo count($listePersonne) ?> personne(s) sont enregistrées </label><br><br>

		<table>
			<tr>

				<th>Nom</th>
				<th>Prénom</th>
				<th>Modifier</th>
			</tr>

			<?php
			foreach ($listePersonne as $personne)
			{ ?>
				<tr>
					<td><?php echo $personne->getPerNom(); ?> </td>
					<td><?php echo $personne->getPerPrenom(); ?> </td>
					<td> <a href="index.php?page=9&numero=<?php echo $personne->getPerNum(); ?>"><img src="./image/modifier.png" alt=""> </a></td>
				</tr>
	<?php } ?>
		</table>
		<br>


		<?php
	} else {

	       }
	    ?>
