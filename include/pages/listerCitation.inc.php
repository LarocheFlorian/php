
	<h1>Liste des citations déposées</h1>

	<?php $db = new Mypdo();
	$manager = new CitationManager($db);
	$listeCitations = $manager->getList();?>


	<label>Actuellement <?php echo count($listeCitations) ?> citation(s) sont enregistrées </label><br><br>

	<div class="tableau">
	<table>
		<tr>
			<th>Nom de l'enseignant</th>
			<th>Libellé</th>
			<th>Date</th>
			<th>Moyenne des notes</th>

		</tr>

		<?php


		foreach ($listeCitations as $citation)
		{ ?>
			<tr>
				<td><?php echo $citation->getCitNomEnseignant(); ?> </td>
				<td><?php echo $citation->getCitLibelle(); ?> </td>
				<td><?php echo $citation->getCitDate(); ?> </td>
				<td><?php echo $citation->getCitMoyenne(); ?> </td>
			</tr>
		<?php } ?>
	</table>
</div>
