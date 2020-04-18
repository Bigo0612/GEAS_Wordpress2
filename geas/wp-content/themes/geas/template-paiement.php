<?php
/* Template Name: Paiement */
session_start();
get_header();
$paiements = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}rendezvous_has_Enfant INNER JOIN geas_rendezvous ON geas_rendezvous.id_rendezvous = geas_rendezvous_has_Enfant.rendezvous_id_rendezvous INNER JOIN  geas_Enfant ON geas_Enfant.id_Enfant = geas_rendezvous_has_Enfant.Enfant_id_Enfant" , OBJECT );
?>
    <h2>Les rendez-vous</h2>
    <table class="rdv">
        <thead>
        <tr>
            <th>id enfant</th>
            <th>heure debut</th>
            <th>heure fin</th>
            <th>date rendez-vous</th>
            <th>jour semaine</th>
            <th>nom enfant</th>
            <th>prenom</th>
            <th>anniv</th>
            <th>age</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody id="the-list">
        <?php foreach ($paiements as $paiement) { ?>
            <tr>
                <td><?php echo $paiement->id_Enfant ?></td>
                <td><?php echo $paiement->heure_debut ?></td>
                <td><?php echo $paiement->heure_fin ?></td>
                <td><?php echo $paiement->date_rendezvous ?></td>
                <td><?php echo $paiement->jour_sem ?></td>
                <td><?php echo $paiement->nom ?></td>
                <td><?php echo $paiement->prenom ?></td>
                <td><?php echo $paiement->date_Birth ?></td>
                <td><?php echo $paiement->age ?></td>
                <td>
                    <a href="LastProjet/GEAS/geas/Rendez-vous/details?id=<?php echo $paiement->id ?> ">voir</a>
                </td>
            </tr>
        <?php   }
        ?>

        </tbody>
    </table>


<?php get_footer();?>