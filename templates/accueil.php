<?php

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
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Départ</th>
      <th scope="col">Sens</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>8h15</td>
      <td>Lille - Lens</td>
      <td><button type="button" class="buttonJoin btn btn-primary">Rejoindre</button></td>
      <td><button type="button" class="btn btn-info"><span class="travelDetails glyphicon glyphicon-eye-open"></span></button></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>9h00</td>
      <td>Lille - Lens</td>
      <td><button type="button" class="buttonJoin btn btn-primary">Rejoindre</button></td>
      <td><button type="button" class="btn btn-info"><span class="travelDetails glyphicon glyphicon-eye-open"></span></button></td>
      <td><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>17h30</td>
      <td>Lens - Lille</td>
      <td><button type="button" class="buttonJoin btn btn-primary" >Rejoindre</button></td>
      <td><button type="button" class="btn btn-info"><span class="travelDetails glyphicon glyphicon-eye-open"></span></button></td>
      <td></td>
    </tr>
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