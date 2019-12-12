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

        $sql = 'SELECT c.cit_num, CONCAT(p.per_nom, p.per_prenom)
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
      public function getListcitationavalider()
      {

        $listeCitations = array();

        $sql = 'SELECT cit_num, CONCAT(p.per_nom, p.per_prenom)
        as cit_nom_enseignant, c.cit_libelle as cit_libelle,
        c.cit_date as cit_date FROM CITATION c
        LEFT JOIN PERSONNE p ON p.per_num = c.per_num
        WHERE c.cit_valide = 0
        GROUP BY c.cit_num, p.per_nom, c.cit_libelle, c.cit_date';
        $req = $this->db->query($sql);
        $req->execute();
        while ($citation = $req->fetch(PDO::FETCH_OBJ)){
          $listeCitations[] = new citation ($citation);
        }
            $req->closeCursor();
        return $listeCitations;

      }

      public function interdit($mot)
      {
        $req = $this->db->prepare('select count(*) as nb from (select mot_interdit ,
                                  match (mot_interdit)
                                  against (:mot)
                                  as pertinence from mot
                                  where match (mot_interdit)
                                  against (:mot))t');
        $req->bindValue(':mot',$mot,PDO::PARAM_STR);
        $req->execute();
        $retour = $req->fetch();
        return $retour["nb"];
      }

      public function add($citation,$numero)
      {
          $req = $this->db->prepare('INSERT INTO citation (per_num, cit_libelle, cit_date, per_num_etu) VALUES (:per_num, :cit_libelle, :cit_date, :per_num_etu)');
          $req->bindValue(':per_num',$citation->getPerNum(),PDO::PARAM_STR);
          $req->bindValue(':cit_libelle',$citation->getCitLibelle(),PDO::PARAM_STR);
          $req->bindValue(':cit_date',$citation->getCitDate(),PDO::PARAM_STR);
          $req->bindValue(':per_num_etu',$numero,PDO::PARAM_STR);
          $retour=$req->execute();
          return $retour;
      }

      public function setvalid($numero,$per_numero)
      {
        $req = $this->db->prepare('update citation set per_num_valide = :per_numero, cit_valide = 1, cit_date_valide = date(now()) where cit_num = :numero');
        $req->bindValue(':per_numero',$per_numero,PDO::PARAM_STR);
        $req->bindValue(':numero',$numero,PDO::PARAM_STR);
        $retour=$req->execute();
        return $retour;
      }

      public function delete($numero)
      {
        $req = $this->db->prepare('delete from citation where'.' cit_num= :numero');
        $req->bindValue(':numero',$numero);
        $retour=$req->execute();
        $req->closeCursor();
        return $retour;
      }


    /* voici la requete elle marche

    SELECT CONCAT(p.per_nom, p.per_prenom)
        as cit_nom_enseignant, c.cit_libelle as cit_libelle,
        c.cit_date as cit_date, AVG(v.vot_valeur) as cit_moyenne FROM CITATION c
        LEFT JOIN PERSONNE p ON p.per_num = c.per_num
        LEFT JOIN VOTE v ON c.cit_num = v.cit_num
        WHERE c.cit_valide = 1 AND c.cit_date_valide is not null
        and cit_date = '2018-10-19'
        and CONCAT(p.per_nom, p.per_prenom) = 'Monediere Thierrry'
        GROUP BY c.cit_num, p.per_nom, c.cit_libelle, c.cit_date, c.cit_num
        ORDER BY cit_moyenne DESC*/
      public function search($enseignant, $date , $note)
      {
          $listeCitations = array();

          $req ='select concat(p.per_nom, p.per_prenom)
            as cit_nom_enseignant, c.cit_libelle as cit_libelle,
            c.cit_date as cit_date, AVG(v.vot_valeur) as cit_moyenne from citation c
            join personne p on p.per_num = c.per_num
            join vote v on c.cit_num = v.cit_num
            where c.cit_valide = 1 and c.cit_date_valide is not null
            and ';

            if ($date == 1)
            {
              $req .= "1=1 ";
            }else {
              $req .= "cit_date =\"".$date.'"';
            }

            $req .= ' and ';

            if ($enseignant == 1)
            {
              $req .= "1=1 ";
            }else {
              $req .= "concat(p.per_nom, p.per_prenom) =\"".$enseignant.'"';
            }

            $req .= ' group by c.cit_num, p.per_nom, c.cit_libelle, c.cit_date, c.cit_num ';

            if ($note != 1)
            {
                $req .= "order by cit_moyenne ".$note;
            }


            $sql = $this->db->query($req);
            $sql->execute();

            while ($citation = $sql->fetch(PDO::FETCH_OBJ)){
              $listeCitations[] = new Citation ($citation);
            }
              $sql->closeCursor();
            return $listeCitations;
      }

      public function getListEnseignantPN()
      {

        $listeEnseignant = array();

        $sql = 'SELECT CONCAT(p.per_nom, p.per_prenom)
        as cit_nom_enseignant FROM personne p
        join salarie s on s.per_num = p.per_num
        join fonction f on f.fon_num = s.fon_num
        where fon_libelle = "Enseignant"';
        $req = $this->db->query($sql);
        $req->execute();
        while ($citation = $req->fetch(PDO::FETCH_OBJ)){
          $listeEnseignant[] = new citation ($citation);
        }
            $req->closeCursor();
        return $listeEnseignant;

      }
}

















 ?>
