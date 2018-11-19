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


<div class="row create_trajet_zone">
  <div class="col-md-5">
    <form role="form" action="controleur.php" class="create_trajet_form">
        <div class="form-group">
          <label for="date">Date du covoiturage : </label>
          <input type="date" id="date" class="form-control" placeholder="Date de départ">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="date">Heure de départ : </label>
          <input type="time" class="form-control" placeholder="Heure de départ">
        </div>
        <div class="form-group">
          <label for="date">Heure d'arrivée : </label>
          <input type="time" class="form-control" placeholder="Heure d'arrivée">
        </div>
        <div class="form-group">
          <label for="date">Prix par passager : </label>
          <div class="inp_prefix"><input type="number" class="form-control" placeholder="Prix par passager"><span>€</span></div>
        </div>
        <div class="form-group">
          <label for="date">Nombre de places à proposer : </label>
          <div class="inp_prefix"><input type="number" class="form-control" placeholder="Entre 1 et 4"><span>places</span></div>
        </div>
        <div>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="radios" id="lenslille" value="lenslille" checked>
              <label class="form-check-label" for="lenslille">
              LENS <span class="glyphicon glyphicon-arrow-right"></span> LILLE
              </label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="radios" id="lillelens" value="lillelens">
              <label class="form-check-label" for="lillelens">
              <span>LENS</span> <span class="glyphicon glyphicon-arrow-left"></span> <span>LILLE</span> 
              </label>
          </div>
        </div>
        <button type="submit" name="action" value="createtrajet" class="btn btn-default">Envoyer</button>
    </form>
   </div>
</div>







