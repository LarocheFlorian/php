<h1>Supprimer les villes</h1>



	<?php $db = new Mypdo();
	$manager = new VilleManager($db);
	$listeVilles = $manager->getListSansDepartement();

	if (empty($_GET["numero"])){ ?>



				<label>Actuellement <?php echo count($listeVilles) ?> ville(s) sont enregistrées </label><br><br>
				<div class="tableau">
				<table border="solid">
				  <tr>
				    <th>Nom</th>
			      <th>Supprimer</th>
				  </tr>

				  <?php


				  foreach ($listeVilles as $ville)
				  { ?>
				    <tr>
				      <td><?php echo $ville->getVilNom(); ?> </td>
			        <td> <a href="index.php?page=12&numero=<?php echo $ville->getVilNum(); ?>"><img src="./image/erreur.png" alt=""> </a></td>
				    </tr> <?php
		 			}

		}else {

			  $pdo=new Mypdo();
			  $villeManager = new VilleManager($pdo);
			  $retour=$villeManager->delete($_GET["numero"]);

			    if ($retour != 0)
			    {
				     ?>
				     <img src="./image/valid.png">
				      La ville a été supprimé
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
