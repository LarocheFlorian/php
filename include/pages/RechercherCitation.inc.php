<h1>Rechercher une citation</h1>

<?php $pdo=new Mypdo();
$citationManager = new CitationManager($pdo); ?>
<label>Nom de l'enseignant</label>
<input type="text" name="" value="">
<label>Date :</label>
<input type="date" name="" value="">
<label>Note :</label>
<select class= name="">
  <option value="asc">Croissant</option>
  <option value="desc">Decroissant</option>
</select>

<?php

echo $citationManager->search('Monediere Thierrry',1,1)

 ?>
