<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php");
	die("");
}

?>


</div>
<!-- fin du content --> 
<?php if (valider("view") != "login") {?>
<div class="container">
  <div class="row cartouche_zone">
      <div class="cartouche">
        <div class="cart_title">Nombre de covoiturages</div>
        <div class="cart_num"><span><?php echo recupGeneriqueBddFunction("nbCovoiturages(".valider("idUser","SESSION").")"); ?></span><span>covoiturages</span></div>
      </div>
      <div class="cartouche">
        <div class="cart_title">Nombre de voyages</div>
        <div class="cart_num"><span><?php echo recupGeneriqueBddFunction("nbVoyages(".valider("idUser","SESSION").")"); ?></span><span>voyages</span></div>
      </div>
      <div class="cartouche">
        <div class="cart_title">Nombre de passagers</div>
        <div class="cart_num"> 
          <?php 
            $count = 0;
            $table = "trajet";
            $result = recupGeneriqueBddFE($table,"id","WHERE idConducteur = 1");
            foreach(parcoursRs($result) as $value)
            {
                $idTr = $value["id"];
                $count += recupGeneriqueBdd("utilisateurTrajet","COUNT(*)","WHERE idTrajet=$idTr");
            }
            echo $count." trajets";
          ?>
        </div>
      </div>
    </div>
    </div>
  <?php }?>
  <!-- fin du wrap -->
</div>
</body>
</html>
