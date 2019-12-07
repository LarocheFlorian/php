<?php


class Fonction
{

  private $fon_num;
  private $fon_libelle;

  public function __construct($valeurs = array()){
      if (!empty($valeurs))
               $this->affecte($valeurs);
  }

  public function affecte($donnees)
  {
    foreach($donnees as $attribut => $valeur)
    {
     switch ($attribut)
     {
       case 'fon_num' : $this->setFonNum($valeur); break;
       case 'fon_libelle' : $this->setFonLib($valeur); break;
     }
    }
   }

   public function getFonLib(){
     return $this->fon_libelle;
   }
   public function setFonLib($id){
     $this->fon_libelle=$id;
   }
   public function getFonNum(){
     return $this->fon_num;
   }
   public function setFonNum($id){
     $this->fon_num=$id;
   }
}

 ?>
