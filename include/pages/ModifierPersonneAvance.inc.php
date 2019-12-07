<h1>Modifier une personne</h1>

<?php
$db = new Mypdo();
$manager = new PersonneManager($db);
$listePersonne = $manager->getList();
$personne = new Personne();

$personne = $manager->getPersonne($_GET["numero"]);
?>
<label> Nom :</label>
 <input type="text" name="per_nom" value=<?php echo $personne->getPerNom();?> > <br>
<label>Prénom : </label>
 <input type="text" name="per_prenom" value=<?php echo $personne->getPerPrenom();?>> <br>
 <label>Téléphone :</label>
 <input type="text" name="per_tel" value=<?php echo $personne->getPerTel();?>> <br>
 <label>Mail :</label>
 <input type="text" name="per_mail" value=<?php echo $personne->getPerMail();?>> <br>
 <label>Login :</label>
 <input type="text" name="per_login" value=<?php echo $personne->getPerLogin();?>> <br>
 <label>Mot de passe : </label>
 <input type="password" name="per_pwd" value=<?php echo $personne->getPerPwd();?>> <br>
 <label>Catégorie : </label>
 <?php if ($manager->estEtudiant($_GET["numero"])){ ?>
   <input type="radio" name="choix" value="Etudiant" checked>Etudiant
   <input type="radio" name="choix" value="Personnel">Personnel <br>
 <?php }else{ ?>
   <input type="radio" name="choix" value="Etudiant">Etudiant
   <input type="radio" name="choix" value="Personnel" checked>Personnel <br>
 <?php } ?>

 <button type="submit" name="Valider">Valider</button>
