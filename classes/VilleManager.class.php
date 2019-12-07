<?php

class VilleManager

{
  public function __construct($db)
  {
    $this->db = $db;
  }


  public function add($ville)
  {
    $req = $this->db->prepare('INSERT INTO ville (vil_nom) VALUES (:vil_nom)');
    $req->bindValue(':vil_nom',$ville->getVilNom(),PDO::PARAM_STR);
    $retour=$req->execute();
    return $retour;

  }

  public function getList()
  {

    $listeVilles = array();

    $sql = 'select vil_num, vil_nom from ville ';
    $req = $this->db->query($sql);
    $req->execute();
    while ($ville = $req->fetch(PDO::FETCH_OBJ)){
      $listeVilles[] = new Ville ($ville);
    }
    return $listeVilles;
    $req->closeCursor();
  }

  public function getListSansDepartement()
  {

    $listeVilles = array();

    $sql = 'select vil_num, vil_nom FROM ville where vil_num not in (select vil_num from departement)';
    $req = $this->db->query($sql);
    $req->execute();
    while ($ville = $req->fetch(PDO::FETCH_OBJ)){
      $listeVilles[] = new Ville ($ville);
    }
    return $listeVilles;
    $req->closeCursor();
  }

  public function delete($numero)
  {
    $req = $this->db->prepare('delete from ville where vil_num= :numero');
    $req->bindValue(':numero',$numero);
    $retour=$req->execute();
    $req->closeCursor();
    return $retour;
  }

  public function edit($ville)
  {
    $req = $this->db->prepare('update ville set vil_nom = :vil_nom where vil_num = :numero');
    $req->bindValue(':numero',$ville->getVilNum(),PDO::PARAM_STR);
    $req->bindValue(':vil_nom',$ville->getVilNom(),PDO::PARAM_STR);
    $retour=$req->execute();
    return $retour;
  }


}
?>
