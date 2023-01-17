<?php include __ROOT__."/views/header.html"; ?>

<form action="/connect" method="post">
<h1> Inscription </h1>
  <div>       
      <div>
            <label for="email">Votre e-mail</label><br>
            <input type="email" id="email" name="email" placeholder="monadresse@mail.com" required>
        </div>

        <div>
            <label for="password">Votre mot de passe :</label><br>
            <input type="password" name="mot_de_passe" id="pass" required/>
      </div>
      <br>
      <input type="submit" value="Connexion">
  </div>
</form>
<form action="/user_add">
  <button type="submit">Inscription</button>
</form>
            
<?php include __ROOT__."/views/footer.html"; ?>