
<h1>Ajouter une citation</h1>
<?php if (empty($_POST["citation"])){ ?>
  <form class="" action="#" method="post">


  <label>Enseignant : </label>
  <select name="nom_enseignant">
  <?php
        foreach ($variable as $key => $value) {
        }?>
  </select><br>
  <label> Date Citation : </label> <input type="text" readonly name="date" value="<?php echo date('d/m/Y'); ?>"> <br>
  <label>Citation :</label>
  <textarea name="citation" rows="6" cols="60"></textarea><br>
  <button type="submit" name="button">Valider</button>

  </form>

<?php }else {
  $string = explode(" ", $_POST["citation"]);
  print_r($string);
} ?>
