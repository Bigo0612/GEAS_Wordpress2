<?php
get_header();

if(!empty($_GET['single']) && is_numeric($_GET['single'])) {
    $id = $_GET['single'];

    global $wpdb;
    $contact = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}rendezvous_has_Enfant WHERE id = :id", OBJECT);

    ?>
    <h2>Profil</h2>
    <p>id: <?= $contact->id; ?></p>
    <p>sujet: <?= $contact->heure_debut; ?></p>
    <p>email: <?= $contact->heure_fin; ?></p>

<?php }
get_footer();