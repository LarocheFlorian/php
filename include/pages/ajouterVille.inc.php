<h1>Ajouter une ville</h1>

<?php if (empty($_POST["vil_nom"])){ ?>

<form action="index.php?page=7" method="post">
  Nom : <input type="text" name="vil_nom"><br>
  <input type="submit" value="Valider">
</form>



<?php }else{

  $pdo=new Mypdo();
  $villeManager = new VilleManager($pdo);
  $ville = new Ville($_POST);
  $retour=$villeManager->add($ville);


    if ($retour != 0)
    {
     ?>
     <img src="./image/valid.png" alt="">
      La ville "<label> <?php echo $_POST["vil_nom"] ?></label>" a été ajoutée
     <?php
     header("refresh:2;url=index.php");
    }
     else
     {
     echo "problème";
    }
  } ?>
