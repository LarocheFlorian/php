<?php

class CitationManager
{

  public function __construct($db)
  {
    $this->db = $db;
  }


  public function getList()
  {

    $listeCitations = array();

    $sql = 'SELECT CONCAT(p.per_nom, p.per_prenom)
    as cit_nom_enseignant, c.cit_libelle as cit_libelle,
    c.cit_date as cit_date, AVG(v.vot_valeur) as cit_moyenne FROM CITATION c
    LEFT JOIN PERSONNE p ON p.per_num = c.per_num
    LEFT JOIN VOTE v ON c.cit_num = v.cit_num
    WHERE c.cit_valide = 1 AND c.cit_date_valide is not null
    GROUP BY c.cit_num, p.per_nom, c.cit_libelle, c.cit_date';
    $req = $this->db->query($sql);
    $req->execute();
    while ($citation = $req->fetch(PDO::FETCH_OBJ)){
      $listeCitations[] = new citation ($citation);
    }
        $req->closeCursor();
    return $listeCitations;

  }

}

















 ?>
