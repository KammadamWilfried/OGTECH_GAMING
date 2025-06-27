<!DOCTYPE html>
<html lang="fr">
<title>OG Tech - Inscription</title>
<?php include "header.php"; ?>

<form action="includes/signup.inc.php" method="POST">
  <div class="container">
    <h3 class="underline white-text grid">Inscription</h3>
    <div class="rounded-card-parent center">
      <div class="card rounded-card">
        <div class="row">
          <div class="input-field col s4 offset-s4">
            <i class="material-icons prefix white-text"></i>
            <input name="username" id="username" type="text" class="validate white-text" minlength="5" maxlength="12">
            <label for="username" class="white-text">Nom d'utilisateur</label>
            <span class="helper-text grey-text left-align" data-error="Min 5, Max 12 caractères" data-success="Min 5, Max 12 caractères">Min 5, Max 12 caractères</span>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s4 offset-s4">
            <i class="material-icons prefix white-text"></i>
            <input name="pwd" id="pwd" type="password" class="validate white-text" minlength="8" maxlength="20">
            <label for="pwd" class="white-text">Mot de passe</label>
            <span class="helper-text grey-text left-align" data-error="Min 8, Max 20 caractères" data-success="Min 8, Max 20 caractères">Min 8, Max 20 caractères</span>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s4 offset-s4">
            <i class="material-icons prefix white-text"></i>
            <input name="repeat_pwd" id="repeat_pwd" type="password" class="validate white-text" maxlength="20">
            <label for="repeat_pwd" class="white-text">Confirmez le mot de passe</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s4 offset-s4">
            <i class="material-icons prefix white-text"></i>
            <input name="email" id="email" type="email" class="validate white-text" maxlength="25">
            <label for="email" class="white-text">Email</label>
            <span class="helper-text white-text" data-error="adresse invalide" data-success="valide"></span>
          </div>
        </div>
        <input class="btn" type="submit" name="submit" value="S'inscrire">
        <div class="errormsg">
          <?php
            if (isset($_GET["error"]))
            {
              if ($_GET["error"] == "empty_input")
                echo "<p>*Veuillez remplir tous les champs !</p>";

              else if ($_GET["error"] == "invalid_uid")
                echo "<p>*Choisissez un nom d'utilisateur valide !</p>";

              else if ($_GET["error"] == "passwords_dont_match")
                echo "<p>*Les mots de passe ne correspondent pas !</p>";

              else if ($_GET["error"] == "username_taken")
                echo "<p>*Nom d'utilisateur ou email déjà utilisé !</p>";
                
              else if ($_GET["error"] == "none") {
                echo "<p class='green-text bold'>Inscription réussie ! Redirection vers la page d'inscription...</p>";
                echo '<META HTTP-EQUIV="Refresh" Content="2; URL=signup.php">';
                exit();
              }
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</form>

<?php include "footer.php"; ?>
</html>