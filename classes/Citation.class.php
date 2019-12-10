<?php

class Citation {

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


      public function getCitLibelle()
      {
          return $this->cit_libelle;
      }

      public function setCitLibelle($cit_libelle)
      {
          $this->cit_libelle = $cit_libelle;

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


                }
            }
        }


}














 ?>
