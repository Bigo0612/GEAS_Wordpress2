<?php

function wpdocs_register_my_home_menu_page(){
    add_menu_page(
        __( 'client', 'geas' ),
        'client',
        'manage_options',
        'clientpageadmin',
        'client_menu_page',
        'dashicons-admin-comments',
        56
    );
}
add_action( 'admin_menu', 'wpdocs_register_my_home_menu_page' );

function client_menu_page(){
    $urlBase = admin_url().'admin.php?page=clientpageadmin';
    ?>
    <ul>
        <li><a class="button" href="<?= $urlBase; ?>">Listing</a></li>
    </ul>
    <?php
    if(!empty($_GET['single']) && is_numeric($_GET['single'])) {
        $id = $_GET['single'];
        client_admin_single($id,$urlBase);
    } else {
        client_admin_listing($urlBase);
    }
}

function client_admin_listing($urlBase)
{
    global $wpdb;
    $clients = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}client ORDER BY created_at DESC", OBJECT );
    ?>
    <div class="wrap">
        <table class="wp-list-table widefat fixed striped posts">
            <thead>
            <tr>
                <th>id</th>
                <th>nom</th>
                <th>prenom</th>
                <th>email</th>

            </tr>
            </thead>

            <tbody id="the-list">
            <?php foreach ($clients as $client) { ?>
                <tr>
                    <td><?= $client->id_Client; ?></td>
                    <td><?= $client->nom; ?></td>
                    <td><?= $client->prenom; ?></td>
                    <td><?= $client->email; ?></td>
                    <td>
                        <a href="<?= $urlBase; ?>&single=<?= $client->id; ?>">Voir</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
}


function client_admin_single($id,$urlBase)
{
    global $wpdb;
    $client = $wpdb->get_row( "SELECT * FROM {$wpdb->prefix}client WHERE id = $id" , OBJECT );
if (!empty($_POST['submitted'])) {

        $wpdb->delete(
            'geas_client',
            array(

                'id' => $id,
            ),
            array(
                '%s'
            )
        );

    }
}
?>

<p>id: <?= $client->id; ?></p>
<p>nom: <?= $client->nom; ?></p>
<p>prenom: <?= $client->prenom; ?></p>
<p>email: <?= $client->email; ?></p>
<p>adresse: <?= $client->adresse; ?></p>
<p>ville: <?= $client->ville; ?></p>
<p>cp: <?= $client->cp; ?></p>
<p>telephone: <?= $client->telephone; ?></p>
<p>Date: <?= date('d/m/Y',strtotime($client->created_at)); ?></p>

<?php  $form = new Form($errors);?>
<Form method="post" action="#">
    <?php
    $html .= $form->submit('submitted','Supprimer');

    echo $html;
    ?>
</Form>



