<?php

class Citation {


      private $cit_num;
      private $cit_nom_enseignant;
      private $cit_libelle;
      private $cit_date;
      private $cit_moyenne;
      private $per_num;

      function __construct($valeurs = array())
      {
        if (!empty($valeurs))
        {
          $this->affecte($valeurs);
        }
      }

      public function getCitNomEnseignant(){
        return $this->cit_nom_enseignant;
      }

      public function setCitNomEnseignant($cit_nom_enseignant){
        $this->cit_nom_enseignant=$cit_nom_enseignant;
        return $this;
      }

      p
      public function setCitNum($cit_num)
      {
          $this->cit_num = $cit_num;

          return $this;
      }
      public function getCitLibelle()
      {
          return $this->cit_libelle;
      }

      public function setCitLibelle($cit_libelle)
      {
          $this->cit_libelle = $cit_libelle;

          return $this;
      }
      public function getCitNomEnseignant()
      {
          return $this->cit_nom_enseignant;
      }

      public function setCitNomEnseignant($cit_nom_enseignant)
      {
          $this->cit_nom_enseignant = $cit_nom_enseignant;

          return $this;
      }

      public function getCitDate()
      {
          return $this->cit_date;
      }

      public function setCitDate($cit_date)
      {
          $this->cit_date = $cit_date;

          return $this;
      }

      public function getCitMoyenne()
      {
          return $this->cit_moyenne;
      }

      public function setCitMoyenne($cit_moyenne)
      {
          $this->cit_moyenne = $cit_moyenne;

          return $this;
      }

      public function setPerNum($per_num)
      {
        $this->per_num = $per_num;
      }

      public function getPerNum()
      {
        return $this->per_num;
      }

      public function affecte($donnees)
      {
            foreach ($donnees as $attribut => $valeur)
            {
                switch ($attribut)
                {
                    case 'cit_libelle': $this->setCitLibelle($valeur); break;
                    case 'cit_date': $this->setCitDate($valeur); break;
                    case 'cit_moyenne': $this->setCitMoyenne($valeur); break;
                    case 'per_num': $this->setPerNum($valeur); break;
                    case 'cit_nom_enseignant': $this->setCitNomEnseignant($valeur); break;
                    case 'cit_num': $this->setCitNum($valeur); break;


                }
            }
        }


}














 ?>
