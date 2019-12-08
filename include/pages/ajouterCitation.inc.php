
<h1>Ajouter une citation</h1>
<?php
$pdo=new Mypdo();
$personneManager = new PersonneManager($pdo);
$listeEnseignant = $personneManager->getListEnseignant();
$citationManager = new CitationManager($pdo);
if (empty($_POST["citation"])){ ?>
  <form class="" action="#" method="post">


  <label>Enseignant : </label>
  <select name="nom_enseignant">
  <?php
        foreach ($listeEnseignant as $enseignant) { ?>
          <option><?php echo $enseignant->getPerNom(); ?></option>
      <?php
    }?>
  </select><br>
  <label> Date Citation : </label> <input type="text" readonly name="date" value="<?php echo date('d/m/Y'); ?>"> <br>
  <label>Citation :</label>
  <textarea name="citation" rows="6" cols="60"></textarea><br>
  <button type="submit" name="button">Valider</button>

  </form>

<?php } else {
  $string = explode(" ", $_POST["citation"]);
  print_r($string);
  $i = 0;
  while ($string[$i])
  {
    if ($citationManager->interdit($string[$i]) == 0) {
      echo ' '.$string[$i];
    }else {
      echo ' ---';
    }
    $i++;
  }
} ?>
