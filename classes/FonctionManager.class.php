<?php


class FonctionManager
{


  private $dbo;
      public function __construct($db){
          $this->db = $db;
      }

      public function getlist()
      {
        $listeFonction = array();

        $sql = 'select * from fonction';
        $resu=$this->db->prepare($sql);
        $resu->execute();

        while($fonction = $resu->fetch(PDO::FETCH_OBJ))
        {
          $listeFonction[] = new Fonction($fonction);
        }
        $resu->closeCursor();
        return $listeFonction;


      }
}


 ?>
