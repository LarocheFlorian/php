

<?php
$pdo=new Mypdo();
$personneManager = new PersonneManager($pdo);
$listeEnseignant = $personneManager->getListEnseignant();
$citationManager = new CitationManager($pdo);



if (empty($_POST["citation"]) && empty($_POST["cit_libelle"])){ ?>
<h1>Ajouter une citation</h1>

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

<?php } elseif(!empty($_POST["citation"]) && empty($_POST["cit_libelle"])) {


            $string = explode(" ", $_POST["citation"]);
            $i = 0;
            $chaineverif = '';
            $erreur = false;

            ?>
            <h1>Ajouter une citation</h1>
            <form class="" action="#" method="post">


            <label>Enseignant : </label>
            <select name="per_num">
            <?php
                  foreach ($listeEnseignant as $enseignant) { ?>
                    <option value="<?php echo $enseignant->getPerNum(); ?>"><?php echo $enseignant->getPerNom(); ?></option>
                <?php
              }?>
            </select><br>
            <label> Date Citation : </label> <input type="text" readonly name="cit_date" value="<?php echo date('Y-m-d'); ?>"> <br> <?php
            while (!empty($string[$i]))
            {
              if ($citationManager->interdit($string[$i]) == 0) {
                $chaineverif = $chaineverif.' '.$string[$i];
              }else {
                $chaineverif = $chaineverif.' ---';
                $erreur = true;
                ?>
                <img src="./image/erreur.png" alt="">
                 Le mot :<label id="rouge"> <?php echo  $string[$i]; ?></label> n'est pas autorisé <br>
                <?php
              }
              $i++;
            } ?>
            <label>Citation :</label>
            <textarea name="cit_libelle" rows="6" cols="60"><?php echo $chaineverif ?></textarea><br>

            <button type="submit" name="button">Valider</button>

            </form>
          <?php
}else {

      $pdo=new Mypdo();
      $citationManager = new CitationManager($pdo);
      $citation = new Citation($_POST);

      $retour=$citationManager->add($citation,$_SESSION["Num"]);
      if ($retour != 0)
      {
       ?>
       <img src="./image/valid.png" alt="">
        La sitation a été ajouté <br>
       <?php
      }
       else
       {
       echo "problème";
      }
 } ?>
