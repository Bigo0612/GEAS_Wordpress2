<?php
get_header();?>
<div class="wrap_infoP">
<h2 class="enfinfo">Enfant Information</h2>
<?php
while ( have_posts() ) :
    the_post();

    global $wpdb;
    $infos = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}Enfants_has_Client INNER JOIN geas_Enfant ON geas_Enfant.id_Enfant = geas_Enfants_has_Client.fk_id_Enfant INNER JOIN  geas_Client ON geas_Client.id_Client = geas_Enfants_has_Client.fk_id_Client" , OBJECT );


    ?>
<div class="parties">
    <?php foreach ($infos as $info){?>
<h3 class="ident">Identification</h3>
    <p class="det">Nom: <?= $info->nom_Client; ?></p>
    <p class="det">Prenom: <?= $info->prenom; ?></p>
    <p class="det">Date de Naissance: <?= $info->date_Birth; ?></p>
    <p class="det">Age: <?= $info->age; ?></p>
    <?php } ?>
</div>
    <h3 class="ident">Information Résponsable légaux</h3>

<h3 class="ident">Pathogenes</h3>
    <h3 class="ident">Rendez-vous</h3>

    </div>

<?php

endwhile; // End of the loop.

get_footer();