<?php
/* Template Name: Paiement */
session_start();
get_header();
$id = $_SESSION['id_Professionel'];
$paiements = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}Professionel_has_Enfant INNER JOIN geas_Professionel ON geas_Professionel.id_Professionel = geas_Professionel_has_Enfant.Professionel_id_Professionel INNER JOIN  geas_Enfant ON geas_Enfant.id_Enfant = geas_Professionel_has_Enfant.Enfant_id_Enfant WHERE Professionel_id_Professionel = $id" , OBJECT );
?>
    <h2>Paiements</h2>
    <table class="rdv">
        <thead>
        <tr>
            <th>id enfant</th>
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
                <td><?php echo $paiement->nom ?></td>
                <td><?php echo $paiement->prenom ?></td>
                <td><?php echo $paiement->date_Birth ?></td>
                <td><?php echo $paiement->age ?></td>
                <td>
                    <a href="LastProjet/GEAS/geas/Paiement/facture?id=<?php echo $paiement->id_Enfant ?> ">voir</a>
                </td>
            </tr>
        <?php   }
        ?>

        </tbody>
    </table>



<?php get_footer();?>