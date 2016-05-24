<?php include 'Database.php'; ?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ladyz</title>
</head>
<body>

  <header>
    <h1>CATEGORIES</h1>
    <ul>
      <?php
      $categories = readAllCategories();
      json_encode($categories); // Passer en JSON le tableau
      foreach ($categories as $key => $cat) {
        echo "<li>".$cat["TitleCat"]."</li>";
      } ?>
    </ul>
  </header>

  <h2>CONNEXION</h2>
  <form method="post" action="">
    <input type="text" name="PseudoUser" placeholder="Login">
    <br>
    <input type="password" name="PassUser" placeholder="Password">
    <br>
    <input type="submit" name="submit" value="connexion">
  </form>

  <br>
  <input type="button" name="deco" value="deconnexion">

  <h2>CRÉER UN COMPTE</h2>
  <form method="post" action="">
    <input type="text" name="PseudoUser" placeholder="Login">
    <br>
    <input type="password" name="PassUser" placeholder="Password">
    <br>
    <input type="mail" name="EmailUser" placeholder="exemple@domaine.extension">
    <br>
    <input type="radio" name="StatusUser" value="IMAC 2018"> IMAC 2018<br>
    <input type="radio" name="StatusUser" value="IMAC 2017"> IMAC 2017<br>
    <input type="radio" name="StatusUser" value="IMAC 2016"> IMAC 2016<br>
    <input type="radio" name="StatusUser" value="IMAC 2015"> IMAC 2015<br>
    <input type="radio" name="StatusUser" value="IMAC plus ancien"> IMAC plus ancien<br>
    <input type="radio" name="StatusUser" value="Prof">Prof<br>
    <input type="radio" name="StatusUser" value="Autre">Autre<br>
    <br>
    <input type="radio" name="SexUser" value="femme"> Femme<br>
    <input type="radio" name="SexUser" value="homme"> Homme<br>
    <br>
    <textarea name="BioUser" rows="8" cols="40" placeholder="Ecrit ta biographie"></textarea>
    <br>
    <input type="submit" name="submit" id="submit" value="Login">
  </form>
</body>
</html>
