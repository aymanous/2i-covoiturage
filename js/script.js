$(document).ready(function(){
   
    // Clic sur le bouton rejoindre un trajet
    $(".buttonJoin").on("click", function(){
      if( $(this).attr("class")=="buttonJoin btn btn-primary"){
        // CASE OU ON JOIN UN TRAJET
        // Comment traduire une variable js en variable php
        //<?php insertGeneriqueBdd("utilisateurtrajet","idUtilisateur,idTrajet","15,15"); ?>

        $.ajax({  url:"controleur.php",
            data: {"action":"setPresent",
                "idTrajet" : $(this).attr("id")}
        });


        console.log("coucou");
        $(this).attr("class", "buttonJoin btn btn-danger");
        $(this).text("Quitter");
      }
      else {
        // CASE OU ON QUITTE UN TRAJET

        $.ajax({  url:"controleur.php",
            data: {"action":"setNotPresent",
                "idTrajet" : $(this).attr("id")}
        });

        console.log("salut delete");

        $(this).attr("class", "buttonJoin btn btn-primary");
        $(this).text("Rejoindre");
      }
    })





    $(".travelDetails").on("click", function(){
      alert("Details pour le trajet " + $(this).attr("class"))
    })





});
