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
      <div class="cart_num"><span><?php echo recupGeneriqueBdd("trajet","COUNT(*)", "WHERE idConducteur = 1") ?></span><span>covoiturages</span></div>
    </div>
    <div class="cartouche">
      <div class="cart_title">Nombre de voyages</div>
      <div class="cart_num"><span>12</span><span>voyages</span></div>
    </div>
    <div class="cartouche">
      <div class="cart_title">Nombre de passagers</div>
      <div class="cart_num"><span><?php 
                                    $count = 0;
                                    $table = "trajet";
                                    $result = recupGeneriqueBddFE($table,"id","WHERE idConducteur = 1");
                                    foreach(parcoursRs($result) as $value)
                                    {
                                        $idTr = $value["id"];
                                        $count += recupGeneriqueBdd("utilisateurTrajet","COUNT(*)","WHERE idTrajet=$idTr");
                                    }
                                    echo $count; ?>
                                    </span><span>trajets</span></div>
    </div>
  </div>
  </div>
 <?php }?>
<!-- fin du wrap -->
</div>

<div id="footer">
  <div class="container">
   	 <p class="text-muted credit">
		<?php
		// Si l'utilisateur est connecte, on affiche un lien de deconnexion 
		if (valider("connecte","SESSION"))
		{
			echo "Utilisateur <b>$_SESSION[pseudo]</b> connecté depuis <b>$_SESSION[heureConnexion]</b> &nbsp; "; 
			echo "<a href=\"controleur.php?action=Logout\">Se Déconnecter</a>";
		}
		?>
	</p>
  </div>
</div>

</body>
</html>
