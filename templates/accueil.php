
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
  $table = "listeTrajets";
  $result = recupGeneriqueBddFE($table,"id");
  foreach(parcoursRs($result) as $value)
  {
      $flag = false;
      $flag2 = false;
      $idTr = $value["id"];
      $idConducteur = recupGeneriqueBdd($table,"idConducteur","WHERE id=$idTr");

      if(valider('idUser','SESSION')){
        $idUtilisateur = $_SESSION['idUser'];
        $flag = true;
        $result2 = recupGeneriqueBdd("utilisateurtrajet","id","WHERE idTrajet=$idTr AND idUtilisateur=$idUtilisateur");
        if(valider('idUser','SESSION') == $idConducteur){
          $flag2 = true;
        }
      }

      $nbrPlaces = recupGeneriqueBdd($table,"placeTotal","WHERE id=$idTr");
      $date = recupGeneriqueBdd($table,"date","WHERE id=$idTr");
      //$heure = recupGeneriqueBdd($table,"heure","WHERE id=$idTr");
      //$commentaire = recupGeneriqueBdd($table,"commentaire","WHERE id=$idTr");
      $villeDepart = recupGeneriqueBdd($table,"villeDepart","WHERE id=$idTr");
      $villeArrivee = recupGeneriqueBdd($table,"villeArrive","WHERE id=$idTr");

      $nomConducteur = recupGeneriqueBdd($table,"nom","WHERE id=$idTr");
      $prenomConducteur = recupGeneriqueBdd($table,"prenom","WHERE id=$idTr");

      

?>
    <tr>
      <th scope="row"><?php echo $idTr ?></th>
      <td><?php echo $prenomConducteur." ".$nomConducteur ?></td>
      <td><?php echo $date ?></td>
      <td><?php echo $villeDepart." - ".$villeArrivee ?></td>
      <?php if($flag == true){
              if($flag2 == false){
        ?>
      <td><button type="button" class="<?php if($result2){echo 'buttonJoin btn btn-danger';} else{echo 'buttonJoin btn btn-primary';} ?>" id="<?php echo $idTr?>"><?php if($result2){echo 'Quitter';} else{echo 'Rejoindre';} ?></button></td>
    <?php }else{echo "<td></td>";} ?>
      <td><button type="button" class="btn btn-info"><span class="travelDetails glyphicon glyphicon-eye-open"></span></button></td>
      <?php if($flag2 == true){ ?>
      <td><button name="<?php echo $idTr ?>" type="button" class="btn deleteTrajet btn-info"><span class="glyphicon glyphicon-trash"></span></button></td>
    <?php } } ?>
      <td></td>
    </tr>
<?php 
  }
?>
  </tbody>
</table>
</p>