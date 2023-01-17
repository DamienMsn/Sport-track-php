<?php include __ROOT__."/views/header.html"; ?>

<form action="/modify_user" method="post">
        <h1>Modification du compte</h1>
        <p>
            <label for="nom">Votre nom</label>
            <input type="text" name="nom" id="nom" value="<?php echo $_SESSION["nom"]; ?>">
        </p>

        <p>
            <label for="prenom">Votre prenom</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo $_SESSION["prenom"]; ?>">
        </p>

        <p>
            <label for="date_naissance">Votre date de naissance</label>
            <input type="date" name="date_naissance" min="1900-01-01" max="2100-01-01" value="<?php echo $_SESSION["date_naissance"]; ?>" class="form-control">
        </p>

        <fieldset>
            <legend>Sexe</legend>
            <p>
                <label>M </label>
                <input type="radio" name="sexe" id="sexeM" disabled />
                <label>F </label>
                <input type="radio" name="sexe" id="sexeF" disabled />
            </p>
        </fieldset>

        <p>
            <label for="taille">Taille (en metre)</label>
            <input type="number" name="taille" id="taille" min = 0 max = 250 step="1" value="<?php echo $_SESSION["taille"]; ?>" >
        </p>

        <p>
            <label for="poids">Poids (en kg)</label>
            <input type="number" name="poids" id="poids" min = 0 max = 200 step="1" value="<?php echo $_SESSION["poids"]; ?>" >
        </p>

        <p>
            <label for="email">Votre e-mail</label>
            <input type="email" id="email" name="email" value="<?php echo $_SESSION["email"]; ?>" disabled>
        </p>

        <p>
            <label for="password">Votre mot de passe (8 characters minimum) :</label>
            <input type="password" name="pass" minlength="8" id="pass" value="<?php echo $_SESSION["mdp"]; ?>" disabled/>
        </p>

        <p>
            <button type="submit">Enregistrer</button>
        </p>
</form>

<form action="/connect_info_controller">
    <button type="submit">Retour</button>
</form>

<?php include __ROOT__."/views/footer.html"; ?>