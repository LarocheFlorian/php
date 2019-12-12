<h1>Rechercher une citation</h1>

<?php $pdo=new Mypdo();
$citationManager = new CitationManager($pdo);
$personneManager = new PersonneManager($pdo);
$listeEnseignant = $citationManager->getListEnseignantPN();?>

<form class="" action="#" method="post">


<label>Nom de l'enseignant</label>
<select name="nom_enseignant">
  <option></option>
<?php

      foreach ($listeEnseignant as $enseignant) { ?>
        <option><?php echo $enseignant->getCitNomEnseignant(); ?></option>
    <?php
  }?>
</select>
<label>Date :</label>
<input type="date" name="date" value="">
<label>Note :</label>
<select name="note">
  <option></option>
  <option value="asc">Croissant</option>
  <option value="desc">Decroissant</option>
</select>
<button type="submit" name="button">Rechercher</button><br><br>
</form>
<?php $db = new Mypdo();
$manager = new CitationManager($db);

  if (empty($_POST["nom_enseignant"]))
  {
    $nom = 1;
  }
  else
  {
    $nom = $_POST["nom_enseignant"];
  }
  if (empty($_POST["note"]))
  {
    $note = 1;
  }
  else
  {
    $note = $_POST["note"];
  }
  if (empty($_POST["date"]))
  {
    $date = 1;
  }
  else
  {
    $date = $_POST["date"];
  }

$listeCitations = $manager->search($nom,$date,$note);
?>



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
