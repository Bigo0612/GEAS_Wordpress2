<?php
/**
 * Register a custom menu page.
 */
function wpdocs_register_my_contact_menu_page(){
    add_menu_page(
        __( 'Contact', 'geas' ),
        'Contact',
        'manage_options',
        'contactpageadmin',
        'contact_menu_page',
        'dashicons-admin-comments',
        56
    );
}
add_action( 'admin_menu', 'wpdocs_register_my_contact_menu_page' );

/**
 * Display a custom menu page
 */
function contact_menu_page(){
    $urlBase = admin_url().'admin.php?page=contactpageadmin';
    ?>
    <ul>
        <li><a class="button" href="<?= $urlBase; ?>">Listing</a></li>
    </ul>
    <?php
    if(!empty($_GET['single']) && is_numeric($_GET['single'])) {
        $id = $_GET['single'];
        contact_admin_single($id,$urlBase);
    } else {
        contact_admin_listing($urlBase);
    }
}


function contact_admin_listing($urlBase)
{
    global $wpdb;
    $contacts = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}contact ORDER BY created_at DESC", OBJECT );
    ?>
    <div class="wrap">
        <table class="wp-list-table widefat fixed striped posts">
            <thead>
            <tr>
                <th>id</th>
                <th>sujet</th>
                <th>email</th>
                <th>message</th>
                <th>date</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody id="the-list">
            <?php foreach ($contacts as $contact) { ?>
                <tr>
                    <td><?= $contact->id; ?></td>
                    <td><?= $contact->sujet; ?></td>
                    <td><?= $contact->email; ?></td>
                    <td><?= $contact->message; ?></td>
                    <td><?= date('d/m/Y',strtotime($contact->created_at)); ?></td>
                    <td>
                        <a href="<?= $urlBase; ?>&single=<?= $contact->id; ?>">voir</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
}

function contact_admin_single($id,$urlBase)
{
    global $wpdb;
    $errors = array();
    $success = false;
    $contact = $wpdb->get_row( "SELECT * FROM {$wpdb->prefix}contact WHERE id = $id" , OBJECT );
    if (!empty($_POST['submitted'])) {
        $sujet = trim(strip_tags($_POST['sujet']));
        $email = trim(strip_tags($_POST['email']));
        $nom_entreprise = trim(strip_tags($_POST['nom_entreprise']));
        $reponse = trim(strip_tags($_POST['reponse']));

        $val = new Validation();

        $errors['email'] = $val->emailValid($email);
        $errors['sujet'] = $val->textValid($sujet, 'sujet', 3, 255);
        $errors['reponse'] = $val->textValid($reponse, 'reponse', 5, 10000);
        $errors['nom_entreprise'] = $val->textValid($nom_entreprise, 'nom_entreprise', 1, 1000);

        if ($val->IsValid($errors)) {

            $wpdb->insert(
                'geas_reponse_contact',
                array(
                    'ID' => NULL,
                    'nom_entreprise' => $nom_entreprise,
                    'email' => $email,
                    'email_client' => $contact->email,
                    'sujet' => $sujet,
                    'reponse' => $reponse,
                    'created_at' => current_time('mysql'),
                    'modified_at' => NULL
                ),
                array(
                    '%s',
                    '%s',
                    '%s',
                    '%s'
                )
            );

        }
    }
?>

    <p>id: <?= $contact->id; ?></p>
    <p>sujet: <?= $contact->sujet; ?></p>
    <p>email: <?= $contact->email; ?></p>
    <p>Message: <?= $contact->message; ?></p>
    <p>Date: <?= date('d/m/Y',strtotime($contact->created_at)); ?></p>

  <?php  $form = new Form($errors);?>
    <Form method="post" action="#">
        <?php
        $html  = $form->label('nom_entreprise','Le nom de l\'entreprise que vous representez :');
        $html .= $form->input('text','nom_entreprise');
        $html .= $form->error('sujet');
        $html .= $form->label('sujet','Le sujet du message :');
        $html .= $form->input('text','sujet');
        $html .= $form->error('sujet');
        $html .= $form->label('email','Email : ');
        $html .= $form->input('email','email');
        $html .= $form->error('email');
        $html .= $form->textarea('reponse');
        $html .= $form->error('reponse');
        $html .= $form->submit('submitted','Envoyer');

        echo $html;
        ?>
    </Form>
    <?php
}