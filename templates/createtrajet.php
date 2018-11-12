<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=login");
	die("");
}

// Chargement eventuel des données en cookies
$login = valider("login", "COOKIE");
$passe = valider("passe", "COOKIE"); 
if ($checked = valider("remember", "COOKIE")) $checked = "checked"; 

?>


<script type="text/javascript">
$('.clockpicker').clockpicker();
</script>

<div class="page-header">
	<h1>Créer un trajet</h1>
</div>


  <div class="row">

    <div class="col-md-4">

 <form role="form" action="controleur.php">


  <div class="form-group">
    <label for="date">Date du covoiturage : </label>
    <input type="date" id="date">
  </div>
    <div class="form-group">
    <label for="date">Heure de départ : </label></br>
    <input type="time">
  </div>
    <div class="form-group">
    <label for="date">Heure d'arrivée : </label></br>
    <input type="time">
  </div>
  <div class="form-group">
    <label for="date">Prix par passager : </label></br>
    <input type="number"> €
  </div>
  <div class="form-group">
    <label for="date">Nombre de place libre dans la voiture : </label></br>
    <input type="number"> places
  </div>


  <button type="submit" name="action" value="createtrajet" class="btn btn-default">Envoyer</button>


</form>

  </div>

  <div class="col-md-4 .offset-md-4">

  </br>

<div class="form-check">
  <input class="form-check-input" type="radio" name="radios" id="lenslille" value="lenslille" checked>
  <label class="form-check-label" for="lenslille">
    LENS <span class="glyphicon glyphicon-arrow-right"></span> LILLE
  </label>
</div> </br>
<div class="form-check">
  <input class="form-check-input" type="radio" name="radios" id="lillelens" value="lillelens">
  <label class="form-check-label" for="lillelens">
    LENS <span class="glyphicon glyphicon-arrow-left"></span> LILLE
  </label>
</div>

  </div>

  <div class="col-md-4 .offset-md-4">


  </div>



</div>







