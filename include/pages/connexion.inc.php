

<h1>Pour vous connecter</h1>
<?php   $db = new Mypdo();
$manager = new PersonneManager($db);
if (!empty($_SESSION["isConnect"]))
{
  $_SESSION["isConnect"] = false;
}
?>
<?php if (empty($_POST["result"]))
{ ?>

<form action="index.php?page=13" method="post">

  <label>Nom d'utilisateur :</label>
  <input type="text" name="per_login"><br>
  <label>Mot de passe : </label>
  <input type="password" name="per_pwd"><br>
  <img src="./image/nb/<?php $_SESSION["numero1"] = random_int(1,9); echo $_SESSION["numero1"];?>.jpg" alt="">
  <label>+</label>
  <img src="./image/nb/<?php $_SESSION["numero2"] = random_int(1,9); echo $_SESSION["numero2"];?>.jpg" alt="">
  <label>=</label>
  <input type="number" name="result"><br>
  <button type="submit" name="button">Valider</button>

</form>

<?php }else if (($_POST["result"] == $_SESSION["numero1"] + $_SESSION["numero2"]) && $manager->isConnexionValide($_POST["per_login"],$_POST["per_pwd"])==1)

{
        unset($_SESSION["numero1"]);
        unset($_SESSION["numero2"]);
        $PersonneConnect = serialize($manager->getInfo($_POST["per_login"]));
        $persoConnect = unserialize($PersonneConnect);
        $_SESSION["login"] = $persoConnect->getPerLogin();
        $_SESSION["admin"] = $persoConnect->getPerAdmin();
        $_SESSION["Num"] = $persoConnect->getPerNum();
        $_SESSION["isConnect"] = true;
        header("refresh:2;url=index.php");
?>
          <img src="./image/valid.png" alt="">

  Vous avez bien été connécté ! <br><br>
  Redirection automatique dans 2 secondes.



<?php
}else {?>
  <form action="index.php?page=13" method="post">

    <label>Nom d'utilisateur :</label>
    <input type="text" name="per_login"><br>
    <label>Mot de passe : </label>
    <input type="password" name="per_pwd"><br>
    <img src="./image/nb/<?php $_SESSION["numero1"] = random_int(1,9); echo $_SESSION["numero1"];?>.jpg" alt="">
    <label>+</label>
    <img src="./image/nb/<?php $_SESSION["numero2"] = random_int(1,9); echo $_SESSION["numero2"];?>.jpg" alt="">
    <label>=</label>
    <input type="number" name="result"><br>
    <button type="submit" name="button">Valider</button><br>
    <img src="./image/erreur.png" alt="">
    <label>Login ou/et Mot de passe incorrect </label>
  </form><?php
} ?>
