<?php



class PersonneManager
{

  function __construct($db)
  {
    $this->db = $db;
  }


  public function getList()
  {

    $listePersonne = array();

    $sql = 'SELECT per_num, per_nom, per_prenom FROM personne';
    $req = $this->db->query($sql);
    $req->execute();
    while ($personne = $req->fetch(PDO::FETCH_OBJ)){
        $listePersonne[] = new personne ($personne);
    }
    $req->closeCursor();
    return $listePersonne;
  }

  public function getListEnseignant()
  {
      $listeEnseignant = array();

      $sql = "SELECT per_nom, p.per_num from personne p
              join salarie s on s.per_num = p.per_num
              join fonction f on f.fon_num = s.fon_num
              where fon_libelle = 'Enseignant'";
      $req = $this->db->query($sql);
      $req->execute();
      while ($enseignant = $req->fetch(PDO::FETCH_OBJ)){
        $listeEnseignant[] = new Personne($enseignant);
      }
      return $listeEnseignant;
      $req->closeCursor();
  }

  public function getPersonne($numero)
  {
    $sql = 'SELECT per_num, per_nom, per_prenom, per_tel, per_mail, per_login, per_admin, per_pwd FROM personne WHERE per_num ='.$numero;
    $req = $this->db->query($sql);
    $req->execute();
    $personne = $req->fetch(PDO::FETCH_OBJ);
    $getpersonne = new Personne($personne);
    return $getpersonne;
  }


  public function getInfo($login)
  {
      $sql = 'select per_login, per_num, per_admin, per_prenom from personne p where per_login = "'.$login.'"';
      $req = $this->db->query($sql);
      $req->execute();
      $preparpersonne = $req->fetch(PDO::FETCH_OBJ);
      $personne = new Personne($preparpersonne);
      return $personne;

  }


  public function estEtudiant($numero)
  {
    $sql = 'SELECT e.per_num, per_nom, per_prenom from personne p, etudiant e where e.per_num=p.per_num and e.per_num = '.$numero ;
    $req = $this->db->query($sql);
    if (($personne = $req->fetch(PDO::FETCH_OBJ)))
    {
      $req->closeCursor();
      return 1;
    }
    else
    {
      $req->closeCursor();
      return 0;
    }
  }


  public function isConnexionValide($login,$motDePasse)
  {
    $salt = "48@!alsd";
    $motdepassecrypte = sha1(sha1($motDePasse). $salt);
    $sql = 'select per_num, per_admin, per_prenom from personne p where per_login = "'.$login.'" and per_pwd = "'.$motdepassecrypte.'"' ;
    $req = $this->db->query($sql);
    if (($personne = $req->fetch(PDO::FETCH_OBJ)))
    {
      $req->closeCursor();
      return 1;
    }
    else
    {
      $req->closeCursor();
      return 0;
    }
  }

  public function addPersonne($personne)
  {
      $req = $this->db->prepare(
        'INSERT INTO personne (per_admin, per_nom, per_prenom, per_tel, per_mail, per_login, per_pwd)
         VALUES (:admin, :nom, :prenom, :tel, :mail, :login, :pwd)');
        $req->bindValue(':nom', $personne->getPerNom(),PDO::PARAM_STR);
        $req->bindValue(':prenom', $personne->getPerPrenom(),PDO::PARAM_STR);
        $req->bindValue(':tel', $personne->getPerTel(),PDO::PARAM_STR);
        $req->bindValue(':mail', $personne->getPerMail(),PDO::PARAM_STR);
        $req->bindValue(':login', $personne->getPerLogin(),PDO::PARAM_STR);
        $req->bindValue(':pwd', $personne->getPerPwd(),PDO::PARAM_STR);
        $req->bindValue(':admin', 0);
        $req->execute();
      }

  public function lastInsertId() {
        $req = $this->db->query("select LAST_INSERT_ID()");
        $req->execute();
        $lastId = $req->fetchColumn();
        return $lastId;
      }

  public function supp($numero)
  {
    $req = $this->db->prepare('DELETE FROM salarie WHERE per_num = :numero');
    $req2 = $this->db->prepare('DELETE FROM etudiant WHERE per_num = :numero');
    $req3 = $this->db->prepare('DELETE FROM vote WHERE per_num = :numero');
    $req4 = $this->db->prepare('DELETE FROM citation WHERE per_num = :numero');
    $req5 = $this->db->prepare('DELETE FROM personne WHERE per_num = :numero');
    $req->bindValue(':numero', $numero);
    $req->execute();
    $req->closeCursor();
    $req2->bindValue(':numero', $numero);
    $req2->execute();
    $req2->closeCursor();
    $req3->bindValue(':numero', $numero);
    $req3->execute();
    $req3->closeCursor();
    $req4->bindValue(':numero', $numero);
    $req4->execute();
    $req4->closeCursor();
    $req5->bindValue(':numero', $numero);
    $req5->execute();
    $req5->closeCursor();
  }

  public function update($personne, $per_num){
    $req = $this->db->prepare(
      'UPDATE `personne` SET `per_nom` = :nom, `per_prenom` = :prenom, `per_tel` = :tel, `per_mail` = :mail, `per_login` = :login, `per_pwd` = :pwd
       WHERE `personne`.`per_num` = :num');


      $req->bindValue(':nom', $personne->getPerNom(),PDO::PARAM_STR);
      $req->bindValue(':prenom', $personne->getPerPrenom(),PDO::PARAM_STR);
      $req->bindValue(':tel', $personne->getPerTel(),PDO::PARAM_STR);
      $req->bindValue(':mail', $personne->getPerMail(),PDO::PARAM_STR);
      $req->bindValue(':login', $personne->getPerLogin(),PDO::PARAM_STR);
      $req->bindValue(':pwd', $personne->getPerPwd(),PDO::PARAM_STR);
      $req->bindValue(':num',$per_num,PDO::PARAM_STR);
      $req->execute();
  }

}
 ?>
