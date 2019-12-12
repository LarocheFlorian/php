

<div id="texte">
<?php
if (!empty($_GET["page"])){
	$page=$_GET["page"];}
	else
	{
		$page=0;
	}

switch ($page)
{
	//
	// Personnes
	//

case 0:
	// inclure ici la page accueil photo
			include_once('pages/accueil.inc.php');
	break;

case 1:
	// inclure ici la page ajouter nouvelle personne
	if (!empty($_SESSION["login"]))
	{
		include_once("pages/ajouterPersonne.inc.php");
	}
    break;

case 2:
	// inclure ici la page lister des personnes
	include_once('pages/listerPersonnes.inc.php');
    break;

case 3:
	// inclure ici la page modification des personnes
	if (!empty($_SESSION["login"]) && $_SESSION["admin"] == 1)
	{
				include("pages/ModifierPersonne.inc.php");
				}
			 break;
case 4:
	// inclure ici la page suppression personnes
	if (!empty($_SESSION["login"]) && $_SESSION["admin"] == 1)
	{
				include("pages/supprimerPersonne.inc.php");
	}
			 break;
//
// Citations
//
case 5:
	// inclure ici la page ajouter citations
	if (!empty($_SESSION["login"]) && $_SESSION["admin"] == 0)
	{
		include_once("pages/ajouterCitation.inc.php");
	}

		break;

case 6:
	// inclure ici la page liste des citations
	include("pages/listerCitation.inc.php");
    break;

case 7:
		// inclure ici la page recherche des citations
		if (!empty($_SESSION["login"]))
		{
			include_once("pages/RechercherCitation.inc.php");
		}
		else
		{
			$page=0;
		}
			break;

case 8:
	//inclure ici la page de valider des Citations
	if (!empty($_SESSION["login"]) && $_SESSION["admin"] == 1)
	{
				include("pages/ValiderCitation.inc.php");
	}

			 break;
case 9 :
	//inclure ici la page supprimer des Citations
	if (!empty($_SESSION["login"]) && $_SESSION["admin"] == 1)
	{

				include("pages/supprimerCitation.inc.php");
				}

			 break;

//
// Villes
//

case 10:
	// inclure ici la page ajouter ville
	if (!empty($_SESSION["login"]))
	{

		include_once("pages/ajouterVille.inc.php");
	}

		break;

case 11:
// inclure ici la page lister  ville
	include("pages/listerVilles.inc.php");
    break;

case 12:
if (!empty($_SESSION["login"]))
{

	include_once("pages/ModifierVilles.inc.php");
}
else
{
	$page=0;
}
	break;

case 13:
if (!empty($_SESSION["login"]) && $_SESSION["admin"] == 1)
{

			include("pages/SupprimerVilles.inc.php");
		}

		 break;

case 14 :
			include_once('pages/connexion.inc.php');
				break;

case 15 :
	include_once('pages/deconnexion.inc.php');
		break;

<<<<<<< HEAD
		case 17:
			// inclure ici la page ajouter ville
			if (!empty($_SESSION["login"]))
			{
=======
case 16:
	// inclure ici la page modification des personnes
	if (!empty($_SESSION["login"]) && $_SESSION["admin"] == 1)
	{
				include("pages/ModifierPersonneAvance.inc.php");
				}
			 break;

>>>>>>> 7c6d56f64f2c7607cc358ecc6196cfe8e3c541c4

				include_once("pages/NoterCitation.inc.php");
			}

				break;

default : 	include_once('pages/accueil.inc.php');
}

?>
</div>
