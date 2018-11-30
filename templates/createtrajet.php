<?php

if(!valider("idUser","SESSION")){
  rediriger("index.php?view=login&msgBad=Veuillez vous connecter pour proposer un trajet !");
}

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
          <input type="date" name="date" id="date" class="form-control" placeholder="Date de départ">
        </div>
        <div class="form-group">
          <label for="date">Heure de départ : </label>
          <input type="time" name="heureDep" class="form-control" placeholder="Date de départ">
        </div>
        <div class="form-group">
          <label for="date">Heure d'arrivée : </label>
          <input type="time" name="heureArri" class="form-control" placeholder="Date de départ">
        </div>
        <div class="form-group">
          <label for="date">Nombre de places à proposer : </label>
          <input type="number" name="place" class="form-control" placeholder="max 5">
        </div>
        <div class="form-group">
          <label for="commentaire">Commentaire pour les passagers : </label>
          <textarea name="commentaire" class="form-control" placeholder="Commentaire" ></textarea>
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
              <span>LILLE</span> <span class="glyphicon glyphicon-arrow-right"></span> <span>LENS</span> 
              </label>
          </div>
        </div>
        <button type="submit" name="action" value="createTrajet" class="btn btn-default">Valider</button>
    </form>
   </div>
</div>







