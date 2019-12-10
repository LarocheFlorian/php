<?php
  $pdo = new Mypdo();
  $manager = new PersonneManager($pdo);
  $divisionManager = new DivisionManager($pdo);
  $divisions=$divisionManager->getList();
  $departementManager = new DepartementManager($pdo);
  $departements=$departementManager->getList();
  $etudiantManager = new EtudiantManager($pdo);
  $salarieManager = new SalarieManager($pdo);
  $fonctionManager = new FonctionManager($pdo);
  $fonctions=$fonctionManager->getList();
  $listePersonne = $manager->getList();
  $personne = $manager->getPersonne($_GET["numero"]);

  if(empty($_POST["per_pwd"]) && !isset($_POST['annee']) && !isset($_POST['tel'])) {
  ?>
  <h1>Modifier une personne</h1>

	<form action="#" method="post">
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
    <input type="password" name="per_pwd" required> <br>
    <label>Catégorie : </label>
    <?php if ($manager->estEtudiant($_GET["numero"])){ ?>
     <input type="radio" name="choix" id="Etudiant" value="Etudiant" checked>Etudiant
     <input type="radio" name="choix" value="Personnel">Personnel <br>
    <?php }else{ ?>
     <input type="radio" name="choix" id="Etudiant" value="Etudiant">Etudiant
     <input type="radio" name="choix" value="Personnel" checked>Personnel <br>
    <?php } ?>

    <button type="submit" name="Valider">Valider</button>
  </form>
<?php } else {
    if(!empty($_POST['per_pwd']) && empty($_POST['annee']) && empty($_POST['tel'])){
    $salt="48@!alsd";
    $pwd_crypte = sha1(sha1($_POST['per_pwd']).$salt);
    $_SESSION['personne'] = serialize(new Personne(array ('per_nom' => $_POST['per_nom'],
    'per_prenom' => $_POST['per_prenom'],
    'per_tel' => $_POST['per_tel'],
    'per_mail' => $_POST['per_mail'],
    'per_login' => $_POST['per_login'],
    'per_pwd' => $pwd_crypte
     )));

    if($manager->estEtudiant($_GET["numero"]) && $_POST['choix'] == "Etudiant"){
      $personne = unserialize($_SESSION['personne']);
      ?>

      <h1>Modifier une personne</h1>

    	<form action="#" method="post">
    		<label for="annee">Année :</label>
    		<select id="annee" name="annee">
    			<?php foreach ($divisions as $division) { ?>
    				<option value="<?php echo $division->getDivNum();?>"><?php echo $division->getDivNom(); ?></option>
    			<?php } ?>
    		</select> <br>
    		<label for="departement">Département : </label>
    		<select id="dep" name="dep">
    			<?php foreach ($departements as $departement) { ?>
    				<option value="<?php echo $departement->getDepNum();?>"><?php echo $departement->getDepNom(); ?></option>
    			<?php } ?>
    		</select> <br>
    		<input type="submit" value="Valider">
    	</form>

      <?php
      echo "était étudiant est maintenant étudiant";
    }
    if($manager->estEtudiant($_GET["numero"]) && $_POST['choix'] == "Personnel"){
      $personne = unserialize($_SESSION['personne']);
      ?>

      <h1>Modifier une personne</h1>

      <form action="#" method="post">
        <label for="Nom">Téléphone professionnel :</label>
        <input type="tel" name="tel" id="tel" /> <br>
        <br>
        <label for="Nom">Fonction :</label>
        <select id="fon" name="fon">
          <?php foreach ($fonctions as $fonction) {?>
            <option value="<?php echo $fonction->getFonNum() ?>"><?php echo $fonction->getFonLib(); ?></option>
          <?php }?>
        </select>
        <br>
        <input type="submit" name="submit" value="Valider" />
      </form>

      <?php
      echo "était étudiant est maintenant salarie";
    }
    if(!$manager->estEtudiant($_GET["numero"]) && $_POST['choix'] == "Personnel"){
      $personne = unserialize($_SESSION['personne']);
      ?>

      <h1>Modifier une personne</h1>

      <form action="#" method="post">
        <label for="Nom">Téléphone professionnel :</label>
        <input type="tel" name="tel" id="tel" /> <br>
        <br>
        <label for="Nom">Fonction :</label>
        <select id="fon" name="fon">
          <?php foreach ($fonctions as $fonction) {?>
            <option value="<?php echo $fonction->getFonNum() ?>"><?php echo $fonction->getFonLib(); ?></option>
          <?php }?>
        </select>
        <br>
        <input type="submit" name="submit" value="Valider" />
      </form>

      <?php
      echo "était salarie est maintenant salarie";
    }
    if(!$manager->estEtudiant($_GET["numero"]) && $_POST['choix'] == "Etudiant"){
      $personne = unserialize($_SESSION['personne']);
      ?>

      <h1>Modifier une personne</h1>

      <form action="#" method="post">
        <label for="annee">Année :</label>
        <select id="annee" name="annee">
          <?php foreach ($divisions as $division) { ?>
            <option value="<?php echo $division->getDivNum(); ?>"><?php echo $division->getDivNom(); ?></option>
          <?php } ?>
        </select> <br>
        <label for="departement">Département : </label>
        <select id="dep" name="dep">
          <?php foreach ($departements as $departement) { ?>
            <option value="<?php echo $departement->getDepNum(); ?>"><?php echo $departement->getDepNom(); ?></option>
          <?php } ?>
        </select> <br>
        <input type="submit" value="Valider">
      </form>

      <?php
      echo "était salarié est maintenant étudiant";
    }
  }
}

    $code = false;

    if($manager->estEtudiant($_GET["numero"]) && isset($_POST['annee'])){
      $personne = unserialize($_SESSION['personne']);
      $manager->update($personne, $_GET["numero"]);

    	$etudiant = new Etudiant(array('per_num' => $_GET["numero"], 'dep_num' => $_POST['dep'],'div_num' => $_POST['annee']));

      $etudiantManager->updateEtudiantPourEtudiant($etudiant);
      $code = true;
      echo "Etu reste etu !";
    }

    if($manager->estEtudiant($_GET["numero"]) && isset($_POST['tel']) && ($code==false)){
      $personne = unserialize($_SESSION['personne']);
      $manager->update($personne, $_GET["numero"]);

    	$salarie = new Salarie(array('per_num' => $_GET["numero"], 'sal_telprof' => $_POST['tel'], 'fon_num' => $_POST['fon']));
      $salarieManager->suppEtu($salarie);
      $salarieManager->updateEtudiantPourSalarie($salarie);
      echo "Etu devient salarie";
      $code = true;
    }

    if(!$manager->estEtudiant($_GET["numero"]) && isset($_POST['annee']) && ($code==false)){
      $personne = unserialize($_SESSION['personne']);
      $manager->update($personne, $_GET["numero"]);

    	$etudiant = new Etudiant(array('per_num' => $_GET["numero"], 'dep_num' => $_POST['dep'],'div_num' => $_POST['annee']));
      $etudiantManager->suppSal($etudiant);
      $etudiantManager->updateSalariePourEtudiant($etudiant);
      echo "sal devient etu";
      $code = true;
    }

    if(!$manager->estEtudiant($_GET["numero"]) && isset($_POST['tel']) && ($code==false)){
      $personne = unserialize($_SESSION['personne']);
      $manager->update($personne, $_GET["numero"]);

    	$salarie = new Salarie(array('per_num' => $_GET["numero"], 'sal_telprof' => $_POST['tel'], 'fon_num' => $_POST['fon']));

      $salarieManager->updateSalariePourSalarie($salarie);
      echo "sal reste sal";
      $code = true;
    }



?>
