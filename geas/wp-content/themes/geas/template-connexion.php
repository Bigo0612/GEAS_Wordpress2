<?php
/* Template Name: Connexion */
session_start();
get_header();

global $wpdb;

$errors = array();
$success = false;

    if (!empty($_POST['submitted'])) {
        $nom_entreprise = trim(strip_tags($_POST['nom_entreprise']));
        $email = trim(strip_tags($_POST['mail']));
        $mdp = trim(strip_tags($_POST['mdp']));
        $confmdp = trim(strip_tags($_POST['confmdp']));

        $val = new Validation();

        $errors['mail'] = $val->emailValid($email);
        $errors['nom_entreprise'] = $val->textValid($nom_entreprise, 'nom_entreprise', 1, 255);
        $errors['mdp'] = $val->textValid($mdp, 'mdp', 10, 255);
        $errors['confmdp'] = $val->textValid($confmdp, 'confmdp', 10, 255);

      //  echo '<pre>';
      //  echo print_r($errors);
      //  echo '</pre>';

if ($val->IsValid($errors)) {
    $connexion = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}Professionel WHERE mail ='" . $email . "'");

    if ($connexion->nom_entreprise === $nom_entreprise) {
        if ($connexion->mail === $email) {
            if (password_verify($mdp,$connexion->mot_de_passe)) {
                if (password_verify($confmdp,$connexion->conf_mot_de_passe)) {

                    $_SESSION['mail'] = array(
                        'id' => $connexion['id'],
                        'nom_entreprise' => $connexion['nom_entreprise'],
                        'ip' => $_SERVER['REMOTE_ADDR'],
                    );
                   // return home_url();
                } else {
                    echo 'confmdp not good';
                }
            } else {
                echo 'mdp not good';
            }
        } else {
            echo 'mail not good';
        }
    } else {
        echo 'nom_entreprise not good';
    }
}
    }
        ?>
            <?php $form= new Form(); ?>
                <div class="cadrement">
                    <Form action="#" method="post">
                        <?php
                        $html = $form->label('nom_entreprise','Nom de L\'entreprise','labpro');
                        $html .= $form->input('text','nom_entreprise','inspro');
                        $html .= $form->label('mail','E-mail','labpro');
                        $html .= $form->input('email','mail','inspro');
                        $html .= $form->label('mdp','Mot de passe','labpro');
                        $html .= $form->input('password','mdp','inspro');
                        $html .= $form->label('confmdp','Confirmation mot de passe','labpro');
                        $html .= $form->input('password','confmdp','inspro');
                        $html .= $form->submit('submitted', 'Envoyer', 'envoiepro');
                        echo $html;?>
                    </Form>
                </div>
