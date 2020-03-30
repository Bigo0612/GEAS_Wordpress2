<?php
/* Template Name: Contact */
get_header();

?>
<h2>Contact</h2>
<?php
$errors = array();
$success = false;
if(!empty($_POST['submitted']))
{
    $sujet = trim(strip_tags($_POST['sujet']));
    $email = trim(strip_tags($_POST['email']));
    $message = trim(strip_tags($_POST['message']));

    $val = new Validation();

    $errors['email'] = $val->emailValid($email);
    $errors['sujet'] = $val->textValid($sujet,'sujet',3,255);
    $errors['message'] = $val->textValid($message,'message',5,10000);

    if($val->IsValid($errors)) {

        $wpdb->insert(
            'won_contact',
            array(
                'ID' => NULL,
                'sujet' => $sujet,
                'email' => $email,
                'message' => $message,
                'created_at' => current_time('mysql')
            ),
            array(
                '%s',
                '%s',
                '%s'
            )
        );

    }
}
$form = new Form($errors);
?>

<Form method="post" action="#">
    <?php
    $html  = $form->label('sujet','Le sujet du message :');
    $html .= $form->input('text','sujet');
    $html .= $form->error('sujet');
    $html .= $form->label('email','Email : ');
    $html .= $form->input('email','email');
    $html .= $form->error('email');
    $html .= $form->textarea('message');
    $html .= $form->error('message');
    $html .= $form->submit('submitted','Envoyer');

    echo $html;
    ?>
</Form>

get_footer();