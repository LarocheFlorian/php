<?php
$db = new Mypdo();
$manager = new PersonneManager($db);
$etudiantManager = new EtudiantManager($db);
$salarieManager = new SalarieManager($db);
$listePersonne = $manager->getList();

if (empty($_GET["numero"]))
{
 ?>
	<h1>Liste des personnes enregistrées</h1>

	<label>Actuellement <?php echo count($listePersonne) ?> personne(s) sont enregistrées </label><br><br>

	<table>
		<tr>
			<th>Numéro</th>
			<th>Nom</th>
			<th>Prénom</th>
		</tr>

		<?php
		foreach ($listePersonne as $personne)
		{ ?>
			<tr>
				<td><a href="index.php?page=2&numero=<?php echo $personne->getPerNum(); ?>"><?php echo $personne->getPerNum(); ?> </td>
				<td><?php echo $personne->getPerNom(); ?> </td>
				<td><?php echo $personne->getPerPrenom(); ?> </td>
			</tr>
<?php } ?>
	</table>
	<br>

	<label>Cliquez sur le numéro de la personne pour obtenir plus d'informations</label>
	<br><br>

	<?php
} else {
        $per_num = $_GET['numero'];
        if ($manager->estEtudiant($per_num)){
          $etudiant=$etudiantManager->detailEtu($per_num);
          ?>
              <h1>Détail sur l'étudiant <?php echo $etudiant->getPerNom();?></h1>
              <table>
                  <tr>
                      <th>Prénom</th>
                      <th>Mail</th>
                      <th>Tel</th>
                      <th>Département</th>
                      <th>Ville</th>
                  </tr>

              <tr>
                  <td><?php echo $etudiant->getPerPrenom();?></td>
                  <td><?php echo $etudiant->getPerMail();?></td>
                  <td><?php echo $etudiant->getPerTel();?></td>
                  <td><?php echo $etudiant->getDepNom();?></td>
                  <td><?php echo $etudiant->getVilNom();?></td>
              </tr>
          </table>
          <?php
        }
        else
        {
          $salarie=$salarieManager->detailSalarie($per_num);
          ?>


                      <h1>Détail sur le salarié <?php echo $salarie->getPerNom();?></h1>
                      <table>
                          <tr>
                              <th>Prénom</th>
                              <th>Mail</th>
                              <th>Tel</th>
                              <th>Tel pro</th>
                              <th>Fonction</th>
                          </tr>
                      <tr>
                          <td><?php echo $salarie->getPerPrenom();?></td>
                          <td><?php echo $salarie->getPerMail();?></td>
                          <td><?php echo $salarie->getPerTel();?></td>
                          <td><?php echo $salarie->getTelProf();?></td>
                          <td><?php echo $salarie->getFonLib();?></td>
                      </tr>
                  </table>
          <?php

        }
    }
    ?>
