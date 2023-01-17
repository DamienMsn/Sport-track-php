<?php include __ROOT__."/views/header.html"; ?>

<form enctype="multipart/form-data" action="/upload" method="post">
    <div class="Ajout de fichier">
        <h1>Ajout de fichier</h1>
        <label>Choisir un fichier :</label>

        <input type="file" name="docpicker" multiple accept=".json" required>

        <p>
            <button type="submit">Enregistrer</button>
        </p>
    </div>
</form>

<form action="/connect_info_controller">
    <button type="submit">Retour</button>
</form>
            
<?php include __ROOT__."/views/footer.html"; ?>