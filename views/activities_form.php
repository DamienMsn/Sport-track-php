<?php include __ROOT__."/views/header.html"; ?>

<div>
    <div>
        <h3>Activités de <?php echo $prenom . " " . $nom; ?></h3>
        <table>
            <tr>
                <th>Date</th>
                <th>Activité</th>
                <th>Durée (en minute)</th>
                <th>Distance (en mètre)</th>
                <th>Cardio fréquence Min</th>
                <th>Cardio fréquence Max</th>
                <th>Cardio fréquence Moy</th>

            </tr>
            <?php foreach ($activities as $activity): ?>
                <tr>
                    <td><?php echo $activity->getDate(); ?></td>
                    <td><?php echo $activity->getDescription(); ?></td>
                    <td><?php echo $activity->getDuree(); ?></td>
                    <td><?php echo $activity->getDistParcourue(); ?></td>
                    <td><?php echo $activity->getFreqMin(); ?></td>
                    <td><?php echo $activity->getFreqMax(); ?></td>
                    <td><?php echo $activity->getFreqMoy(); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<form action="/connect_info_controller">
    <button type="submit">Retour</button>
</form>

<?php include __ROOT__."/views/footer.html"; ?>