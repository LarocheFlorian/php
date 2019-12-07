<?php
class Salarie extends Personne{
 private $per_num;
 private $sal_telprof;
 private $fon_num;


   public function __construct($valeurs = array()){
         if (!empty($valeurs))
                  parent::__construct($valeurs);
                  $this->affecteSalarie($valeurs);
     }

    public function affecteSalarie($donnees){
         foreach ($donnees as $attribut => $valeur){
           switch ($attribut){
               case 'per_num': $this->setPerNum($valeur); break;
               case 'sal_telprof': $this->setTelProf($valeur); break;
               case 'fon_num': $this->setFonNum($valeur); break;
           }
       }
   }

     public function getTelProf(){
       return $this->sal_telprof;
     }

     public function setTelProf($id){
       $this->sal_telprof=$id;
     }

     public function getPerNum(){
       return $this->per_num;
     }

     public function setPerNum($id){
       $this->per_num=$id;
     }

     public function getFonNum(){
       return $this->fon_num;
     }

     public function setFonNum($id){
       $this->fon_num=$id;
     }
   }
?>
