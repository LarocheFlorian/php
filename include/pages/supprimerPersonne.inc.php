
	<h1>Supprimer des personnes enregistrées</h1>

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
				<th>Supprimer</th>
			</tr>

			<?php
			foreach ($listePersonne as $personne)
			{ ?>
				<tr>
					<td><?php echo $personne->getPerNom(); ?> </td>
					<td><?php echo $personne->getPerPrenom(); ?> </td>
					<td> <a href="index.php?page=4&numero=<?php echo $personne->getPerNum(); ?>"><img src="./image/erreur.png" alt=""> </a></td>
				</tr>
	<?php } ?>
		</table>
		<br>


		<?php
	} else {
					if($manager->estEtudiant($_GET["numero"]))
					{
						echo "l'etudiant a bien été supprimé ";
						$managerEtudiant = new EtudiantManager($db);
						$manager->supp($_GET["numero"]);
						$managerEtudiant->supp($_GET["numero"]);
					}else {
						echo "le salarié a bien été supprimé ";
						$managerSalarie = new SalarieManager($db);
						$manager->supp($_GET["numero"]);
						$managerSalarie->supp($_GET["numero"]);
					}

				 }
			?>
