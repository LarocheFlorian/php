<?php
class SalarieManager {
    private $dbo;
        public function __construct($db){
            $this->db = $db;
        }

   public function detailSalarie($perNum){
     $sql = 'SELECT p.per_prenom, p.per_nom, p.per_mail, p.per_tel, s.sal_telprof, f.fon_libelle FROM PERSONNE p JOIN SALARIE s ON p.per_num = s.per_num JOIN FONCTION f ON f.fon_num = s.fon_num WHERE p.per_num ='.$perNum;
     $requete = $this->db->prepare($sql);
     $requete->execute();
     $detailSalarie = $requete->fetch(PDO::FETCH_OBJ);
     $salarie = new Salarie($detailSalarie);
     $requete->closeCursor();
     return $salarie;
   }

   public function addSalarie($salarie)
   {
     $req = $this->db->prepare('INSERT INTO salarie (per_num, sal_telprof, fon_num) VALUES (:per_num, :sal_telprof, :fon_num)');
     echo "string";
     $req->bindValue(':per_num',$salarie->getPerNum(),PDO::PARAM_STR);
     $req->bindValue(':sal_telprof',$salarie->getPerTel(),PDO::PARAM_STR);
     $req->bindValue(':fon_num',$salarie->getFonNum(),PDO::PARAM_STR);
     $retour=$req->execute();
     return $retour;

   }

   public function supp($numero)
   {
     $sql = 'delete from salarie where per_num='.$numero;
     $req = $this->db->query($sql);
     $req->execute();
     $req->closeCursor();
   }
}
?>
