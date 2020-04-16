<?php
/* Template Name: Connexion */
session_start();
global $wpdb;
get_header();

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

                  //  add_action('init', 'geas_start_session', 1);

                   $_SESSION['id_Professionel'] = $connexion->id_Professionel;
                    $_SESSION['mail'] = $connexion->mail;
                    $_SESSION['nom_entreprise'] = $connexion->nom_entreprise;
                    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];

                    //echo '<pre>';
                    //  echo print_r($_SESSION);
                    //  echo '</pre>'; ?>
                    <script type="text/javascript">
                <!--
                    window.location.replace("../");
                -->
            </script>
<?php
                   // $location = esc_url(home_url($web['pages']['contact']['slug']));
                 // wp_redirect(home_url());
                } else {
                    $errors['badconfmdp'] = 'Mot de passe ou confirmation de passe incorrect';
                }
            } else {
                $errors['badmdp'] = 'Mail ou Mot de passe incorect';
            }
        } else {
            $errors['badmail'] = 'Mail ou Mot de passe incorect';
        }
    } else {
        $errors['badent'] = 'Identifiant ou Mot de passe incorect';
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
