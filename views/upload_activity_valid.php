<?php include __ROOT__."/views/header.html";?>

<div>
    <h3>Activité enregistrée avec succès</h3>
    <p>Vous pouvez consulter vos activités en cliquant sur le bouton ci-dessous</p>
    <form action="/activities">
        <button type="submit">Visualisation des activité</button>
    </form>

    <form action="/connect_info_controller">
        <button type="submit">Retour</button>
    </form>
</div>

<?php include __ROOT__."/views/footer.html";?>