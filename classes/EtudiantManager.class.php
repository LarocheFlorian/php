<?php
class EtudiantManager {
    private $dbo;
        public function __construct($db){
            $this->db = $db;
        }


   public function detailEtu($perNum){
     $sql = 'SELECT p.per_prenom,P.per_nom, p.per_mail, p.per_tel, d.dep_nom, v.vil_nom FROM PERSONNE p JOIN ETUDIANT e ON p.per_num = e.per_num JOIN DEPARTEMENT d ON e.dep_num = d.dep_num JOIN VILLE v ON d.vil_num = v.vil_num  WHERE p.per_num ='.$perNum;
     $requete = $this->db->prepare($sql);
     $requete->execute();
     $detailEtu = $requete->fetch(PDO::FETCH_OBJ);
     $etu = new Etudiant($detailEtu);
     $requete->closeCursor();
     return $etu;
   }
   public function addEtudiant($etudiant)
   {
     $req = $this->db->prepare('INSERT INTO etudiant (per_num, dep_num, div_num) VALUES (:per_num, :dep_num, :div_num)');
     $req->bindValue(':per_num',$etudiant->getPerNum(),PDO::PARAM_STR);
     $req->bindValue(':dep_num',$etudiant->getDepNum(),PDO::PARAM_STR);
     $req->bindValue(':div_num',$etudiant->getDivNum(),PDO::PARAM_STR);
     $retour=$req->execute();
     return $retour;

   }

   public function updateEtudiantPourEtudiant($etudiant){
     $req = $this->db->prepare('UPDATE `etudiant` SET `dep_num` = :dep_num, `div_num` = :div_num WHERE `etudiant`.`per_num` = :num');
     $req->bindValue(':num',$etudiant->getPerNum(),PDO::PARAM_STR);
     $req->bindValue(':dep_num',$etudiant->getDepNum(),PDO::PARAM_STR);
     $req->bindValue(':div_num',$etudiant->getDivNum(),PDO::PARAM_STR);
     $retour=$req->execute();
   }

   public function suppSal($etudiant){
     $req = $this->db->prepare('DELETE FROM `salarie` WHERE `salarie`.`per_num` = :per_num');
     $req->bindValue(':per_num',$etudiant->getPerNum(),PDO::PARAM_STR);
     $retour=$req->execute();
   }

   public function updateSalariePourEtudiant($etudiant){
     $req = $this->db->prepare('INSERT INTO etudiant (per_num, dep_num, div_num) VALUES (:per_num, :dep_num, :div_num)');
     $req->bindValue(':per_num',$etudiant->getPerNum(),PDO::PARAM_STR);
     $req->bindValue(':dep_num',$etudiant->getDepNum(),PDO::PARAM_STR);
     $req->bindValue(':div_num',$etudiant->getDivNum(),PDO::PARAM_STR);
     $retour=$req->execute();
   }

   
   public function supp($numero)
   {

   }
}
?>
