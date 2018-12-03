$(document).ready(function(){

        var nbCovoit = parseInt($("#nbCovoitCart").text());
        if(nbCovoit<2){
             $("#covoitWordS").empty();
         $("#covoitWordS").append("covoiturage");
         $("#covoitWordSTittle").empty();
            $("#covoitWordSTittle").append("Nombre de covoiturage");
         }
   
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

        $(this).attr("class", "buttonJoin btn btn-primary");
        $(this).text("Rejoindre");
      }
    })


    $(".deleteTrajet").on("click", function(){

        console.log($(this).attr("name"));
        // CASE OU ON JOIN UN TRAJET
        // Comment traduire une variable js en variable php
        //<?php insertGeneriqueBdd("utilisateurtrajet","idUtilisateur,idTrajet","15,15"); ?>

        $(this).parent().parent().hide();

        $.ajax({  url:"controleur.php",
            data: {"action":"deleteTrajet",
                "idTrajet" : $(this).attr("name"),
            callback : function(){

                            var nbCovoit = parseInt($("#nbCovoitCart").text());
                            nbCovoit--;
                            $("#nbCovoitCart").empty();
                            $("#nbCovoitCart").append(nbCovoit);
                            if(nbCovoit<2){
                                $("#covoitWordS").empty();
                            $("#covoitWordS").append("covoiturage");
                            $("#covoitWordSTittle").empty();
                            $("#covoitWordSTittle").append("Nombre de covoiturage");
                            }

                        }}
        });
      
    })

    $(".travelDetails").on("click", function(){
      alert("Details pour le trajet " + $(this).attr("class"))
    })




    function deleteMessage(){
      $("#warningCreaTrajet").fadeOut();
   };


    $("#submitCreateTrajet").on("click", function(){
        if($("#dateCreaTrajet").val() && $("#heureDepCreaTrajet").val() && $("#placeCreaTrajet").val() && $("#commentaireCreaTrajet").val()){


      console.log("creation du trajet");
      console.log($('input[name=radios]:checked', '#create_trajet_form').val())
      $.ajax({  url:"controleur.php",
            data: {"action":"createTrajet",
                "date" : $("#dateCreaTrajet").val(),
                "heureDep" : $("#heureDepCreaTrajet").val(),
                "place" : $("#placeCreaTrajet").val(),
                "commentaire" : $("#commentaireCreaTrajet").val(),
                "radios" : $('input[name=radios]:checked', '#create_trajet_form').val(),
                callback : function(){

                            var nbCovoit = parseInt($("#nbCovoitCart").text());
                            nbCovoit++;
                            $("#nbCovoitCart").empty();
                            $("#nbCovoitCart").append(nbCovoit);
                            if(nbCovoit>1){
                                 $("#covoitWordS").empty();
                             $("#covoitWordS").append("covoiturages");
                             $("#covoitWordSTittle").empty();
                                $("#covoitWordSTittle").append("Nombre de covoiturages");
                             }
                            $("#create_trajet_form").empty();
                            $("#create_trajet_form").append("<p>bravo bg tu as créé un trajet sur un site hyper cool</p>")

                        }
            }
        });
  }else{
    $("#checkCity").after("<div id='warningCreaTrajet' class='alert alert-danger' role='alert'>Vous devez remplir l'ensemble des champs</div>");
    window.setTimeout( deleteMessage , 3000 );
    
    
  }
    })


    setTimeout(function(){
        $(".notifMsg").hide();
    },3000);

});
