<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <?php
		$title = "Bienvenue sur le site du bétisier de l'IUT.";?>
		<title>
		<?php echo $title ?>
		</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
?v={random number/string}
</head>
	<body>
	<div id="header">
		<div id="connect">
      <?php


      if (empty($_SESSION["isConnect"]))
      { ?>
        <label><a href="index.php?page=14">Connexion</a></label>
        <?php
      }
      else
      {

        ?>
        utilisateur : <label><?php  echo $_SESSION["login"]; ?>
        </label> <label><a href="index.php?page=15">Deconnexion</a></label>
<?php } ?>
		</div>
		<div id="entete">
			<div id="logo">
        <?php
        if (empty($_SESSION["isConnect"]))
        {
          ?>  <img src="./image/lebetisier.gif" id="logo"><?php
        }
        else
        { ?>
        <img src="./image/smile.jpg" id="logo">
  <?php } ?>

			</div>
			<div id="titre">
				Le bétisier de l'IUT,<br />Partagez les meilleures perles !!!
			</div>
		</div>
	</div>
