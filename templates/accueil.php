
<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
error_reporting(E_ALL);
//C'est la propriété php_self qui nous l'indique : 
// Quand on vient de index : 
// [PHP_SELF] => /chatISIG/index.php 
// Quand on vient directement par le répertoire templates
// [PHP_SELF] => /chatISIG/templates/accueil.php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
// Pas de soucis de bufferisation, puisque c'est dans le cas où on appelle directement la page sans son contexte
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=accueil");
	die("");
}

?>

    <div class="page-header">
      <h1>Liste des trajets</h1>
    </div>

    <p class="lead">

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Conducteur</th>
      <th scope="col">Départ</th>
      <th scope="col">Sens</th>
    </tr>
  </thead>
  <tbody>
<?php 
  $nbr = 0;
  $table = "trajet";
  $result = recupGeneriqueBddFE($table,"id","ORDER BY id DESC");
  foreach(parcoursRs($result) as $value)
  {
      $idTr = $value["id"];
      $idConducteur = recupGeneriqueBdd($table,"idConducteur","WHERE id=$idTr");
      $nbrPlaces = recupGeneriqueBdd($table,"placeTotal","WHERE id=$idTr");
      $date = recupGeneriqueBdd($table,"date","WHERE id=$idTr");
      //$heure = recupGeneriqueBdd($table,"heure","WHERE id=$idTr");
      $commentaire = recupGeneriqueBdd($table,"commentaire","WHERE id=$idTr");
      $villeDepart = recupGeneriqueBdd($table,"villeDepart","WHERE id=$idTr");
      $villeArrivee = recupGeneriqueBdd($table,"villeArrive","WHERE id=$idTr");

      $nomConducteur = recupGeneriqueBdd("utilisateur","nom","WHERE id=$idConducteur");
      $prenomConducteur = recupGeneriqueBdd("utilisateur","prenom","WHERE id=$idConducteur");

      $nbr++;
?>
    <tr>
      <th scope="row"><?php echo $nbr ?></th>
      <td><?php echo $prenomConducteur." ".$nomConducteur ?></td>
      <td><?php echo $date." à " ?></td>
      <td><?php echo $villeDepart." - ".$villeArrivee ?></td>
      <td><button type="button" class="buttonJoin btn btn-primary">Rejoindre</button></td>
      <td><button type="button" class="btn btn-info"><span class="travelDetails glyphicon glyphicon-eye-open"></span></button></td>
      <td></td>
    </tr>
<?php 
  }
?>
  </tbody>
</table>
</p>
<script type="text/javascript">

$(document).ready(function(){
   

    $(".buttonJoin").on("click", function(){
      if( $(this).attr("class")=="buttonJoin btn btn-primary"){
        $(this).attr("class", "buttonJoin btn btn-danger");
        $(this).text("Quitter");
      }
      else {
        $(this).attr("class", "buttonJoin btn btn-primary");
        $(this).text("Rejoindre");
      }
    })



    $(".travelDetails").on("click", function(){
      alert("Details pour le trajet " + $(this).attr("class"))
    })





});





</script>