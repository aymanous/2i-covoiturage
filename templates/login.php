<link rel="stylesheet" type="text/css" href="css/login.css">

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

<div class="page-header">
	<h1>Connexion</h1>
</div>

<div class="login_zone">
  <div class="login_desc"></div>
  <div class="login_form">
    <form role="form" action="controleur.php">
      <div class="form-group">
          <label for="email">Login</label>
          <input type="text" class="form-control" id="email" name="login" value="<?php echo $login;?>" >
      </div>
      <div class="form-group">
          <label for="pwd">Passe</label>
          <input type="password" class="form-control" id="pwd" name="passe" value="<?php echo $passe;?>">
      </div>
      <div class="checkbox">
          <label><input type="checkbox" name="remember" <?php echo $checked;?> >Se souvenir de moi</label>
      </div>
      <div class="msgAsyncLogin"></div>
      <button type="submit" name="action" value="Connexion" class="btn btn-default btn_login">Connexion</button>
    </form>
  </div>
</div>  

<script>
  $(".btn_login").attr("disabled",   "disabled");
  onOffBtn("#email");
  onOffBtn("#pwd");

  function onOffBtn(idInp){
    $(idInp).keyup(function(){
      if($("#email").val().length > 0 && $("#pwd").val().length > 0){
        $(".btn_login").removeAttr("disabled");
      }else{
        $(".btn_login").attr("disabled", "disabled");
      }
    });
  }
 
</script>



		</div>
	</div>
</div>
</section>