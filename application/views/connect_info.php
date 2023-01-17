<?php

include __ROOT__."/views/header.html";

echo "Mail =". $_SESSION['email'];
echo "<br>";
echo "Mot de passe =". $_SESSION['mot_de_passe'];

include __ROOT__."/views/footer.html";
?>

<br>
<form action="/upload">
      <button type="submit">Ajout d'activité</button>
</form>

<form action="/activities">
      <button type="submit">Visualisation des activité</button>
</form>

<form action="/modify_user">
      <button type="submit">Modification du compte</button>
</form>

<form action="/disconnect">
      <button type="submit">Déconnexion</button>
</form>
