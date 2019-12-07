<h1>Modifier les villes</h1>



	<?php $db = new Mypdo();
	$manager = new VilleManager($db);
	$listeVilles = $manager->getList();

	if (empty($_GET["numero"]) && (empty($_POST["vil_nom"]))){ ?>



				<label>Actuellement <?php echo count($listeVilles) ?> ville(s) sont enregistrées </label><br><br>
				<div class="tableau">
				<table border="solid">
				  <tr>
				    <th>Nom</th>
			      <th>Modifier</th>
				  </tr>

				  <?php


				  foreach ($listeVilles as $ville)
				  { ?>
				    <tr>
				      <td><?php echo $ville->getVilNom(); ?> </td>
			        <td> <a href="index.php?page=11&numero=<?php echo $ville->getVilNum(); ?>"><img src="./image/modifier.png" alt=""> </a></td>
				    </tr> <?php
		 			}

		} elseif(empty($_POST["vil_nom"])){

				$_SESSION["numero"] = $_GET["numero"];
				?>
				<form action="index.php?page=11" method="post">
					<label>Nom :</label>
					 <input type="text" name="vil_nom"><br>
					<input type="submit" value="Valider">
				</form>

				<?php
		}else {

			  $pdo=new Mypdo();
			  $villeManager = new VilleManager($pdo);
			  $ville = serialize(new Ville(array ('vil_num' => $_SESSION['numero'],'vil_nom' => $_POST['vil_nom'])));
			  $retour=$villeManager->edit(unserialize($ville));

			    if ($retour != 0)
			    {
				     ?>
				     <img src="./image/valid.png">
				      La ville "<label> <?php echo $_POST["vil_nom"] ?></label>" a été modifié
				     <?php
     	 			header("refresh:2;url=index.php");
			    }
				     else
				     {
				     echo "problème";
			    }
	  } ?>
	</table>
	</div>
