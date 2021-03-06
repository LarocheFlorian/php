<?php
class Etudiant extends Personne{

 private $per_num;
 private $dep_num;
 private $div_num;
 private $div_lib;


 public function __construct($valeurs = array()){
     if (!empty($valeurs))
              parent::__construct($valeurs);
              $this->affecteEtu($valeurs);
 }
 public function affecteEtu($donnees){
   foreach ($donnees as $attribut => $valeur){
     switch ($attribut){
       case 'per_num': $this->setPerNum($valeur); break;
       case 'dep_num': $this->setDepNum($valeur); break;
       case 'div_num': $this->setDivNum($valeur); break;
       case 'div_lib': $this->setDivLib($valeur); break;
       case 'dep_nom'; $this->setDepNom($valeur); break;
       case 'vil_nom'; $this->setVilNom($valeur); break;
     }
   }
 }


 public function getPerNum()
 {
  return $this->per_num;
 }
 public function setPerNum($per_num)
 {
   $this->per_num = $per_num;
 }

 public function getDivNum(){
   return $this->div_num;
 }
 public function setDivNum($id){
   $this->div_num=$id;
 }

 public function getDepNum(){
   return $this->dep_num;
 }
 public function setDepNum($id){
   $this->dep_num=$id;
 }

 public function getDivLib(){
   return $this->div_libelle;
 }
 public function setDivLib($id){
   $this->div_libelle=$id;
 }

 public function getDepNom(){
   return $this->dep_nom;
 }
 public function setDepNom($id){
   $this->dep_nom=$id;
 }

 public function getVilNom(){
   return $this->vil_nom;
 }
 public function setVilNom($id){
   $this->vil_nom=$id;
 }
}
?>
