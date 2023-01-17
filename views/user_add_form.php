<?php 
include __ROOT__."/views/header.html";?>

<form action="/user_add" method="post">
  <p>
            <label for="nom">Votre nom</label>
            <input type="text" id="nom" name="nom" placeholder="Martin" required>
        </p>

        <p>
            <label for="prenom">Votre prenom</label>
            <input type="text" id="prenom" name="prenom" placeholder="Lucas" required>
        </p>

        <p>
            <label for="date_naissance">Votre date de naissance</label>
            <input type="date" name="date_naissance" min="1900-01-01" max="2100-01-01" required class="form-control">
        </p>

        <fieldset>
            <legend>Sexe</legend>
            <p>
                <label for="M">M </label>
                <input type="radio" name="sexe" id="M" value="M" required />
                <label for="F">F </label>
                <input type="radio" name="sexe" id="F" value="F"/>
            </p>
        </fieldset>

        <p>
            <label for="taille">Taille (en cm)</label>
            <input type="number" name="taille" id="taille" min = 0 max = 250 step="1" placeholder="170" required>
        </p>

        <p>
            <label for="poids">Poids (en kg)</label>
            <input type="number" name="poids" id="poids" min = 0 max = 200 step="1" placeholder="75" required>
        </p>

        <p>
            <label for="email">Votre e-mail</label>
            <input type="email" id="email" name="email" placeholder="monadresse@mail.com" required>
        </p>

        <p>
            <label for="password">Votre mot de passe (8 characters minimum) :</label>
            <input type="password" name="pass" minlength="8" id="pass" required/>
        </p>

        <p>
            <button type="submit">Enregistrer</button>
        </p>
 
</form>

<form action="/connect">
    <button type="submit">Retour</button>
</form>

<?php include __ROOT__."/views/footer.html";?>


