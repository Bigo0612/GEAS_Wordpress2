<?php
/* Template Name: Home */
get_header();

global $wpdb;
$errors = array();
$success = false;
$pro = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}Professionel" , OBJECT );
if (!empty($_POST['submited'])) {

    $nom_entreprise = trim(strip_tags($_POST['nom_entreprise']));
    $mail = trim(strip_tags($_POST['mail']));
    $adresse1 = trim(strip_tags($_POST['adresse1']));
    $adresse2 = trim(strip_tags($_POST['adresse2']));
    $adresse3 = trim(strip_tags($_POST['adresse3']));
    $mot_de_passe = trim(strip_tags($_POST['mot_de_passe']));
    $conf_mot_de_passe = trim(strip_tags($_POST['conf_mot_de_passe']));
    $tel = trim(strip_tags($_POST['tel']));
    $raison_sociale = trim(strip_tags($_POST['raison_sociale']));
    $ville = trim(strip_tags($_POST['ville']));
    $cp = trim(strip_tags($_POST['cp']));
    $tel_pro = trim(strip_tags($_POST['tel_pro']));


    $val = new Validation();

    $errors['mail'] = $val->emailValid($mail);
    $errors['nom_entreprise'] = $val->textValid($nom_entreprise, 'nom_entreprise', 1, 255);
    $errors['adresse1'] = $val->textValid($adresse1, 'adresse1', 5, 255);
    $errors['adresse2'] = $val->textValid2($adresse2, 'adresse2', 5, 255);
    $errors['adresse3'] = $val->textValid2($adresse3, 'adresse3', 5, 255);
    $errors['mot_de_passe'] = $val->textValid($mot_de_passe, 'mot_de_passe', 10, 255);
    $errors['conf_mot_de_passe'] = $val->textValid($conf_mot_de_passe, 'conf_mot_de_passe', 10, 255);
    $errors['raison_sociale'] = $val->textValid($raison_sociale, 'raison_sociale', 5, 255);
    $errors['ville'] = $val->textValid($ville, 'ville', 1, 255);
    $errors['cp'] = $val->codepostale($cp);
    $errors['tel_pro'] = $val->tel($tel_pro);
    $errors['rep'] = $val->doublont($nom_entreprise,$pro->nom_entreprise,'Le nom de l\'entreprise ');
    $errors['mdp'] = $val->confmdp($mot_de_passe,$conf_mot_de_passe);



    if ($val->IsValid($errors)) {


        $wpdb->insert(
            'geas_Professionel',
            array(
                'id_Professionel' => NULL,
                'nom_entreprise' => $nom_entreprise,
                'mail' => $mail,
                'adresse1' => $adresse1,
                'adresse2' => NULL,
                'adresse3' => NULL,
                'mot_de_passe' => password_hash($mot_de_passe, PASSWORD_DEFAULT),
                'conf_mot_de_passe' => password_hash($conf_mot_de_passe, PASSWORD_DEFAULT),
                'tel_pro' => $tel_pro,
                'raison_sociale' => $raison_sociale,
                'ville' => $ville,
                'cp' => $cp,
                'longitude' => 1,
                'latitude' => 2,
                'altitude' => 3,
                'created_at' => current_time('mysql'),
                'modified_at' => NULL
            ),
            array(
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%d',
                '%d',
                '%d',
                '%d'
            )
        );

    }

}

?>
    <h2 class="subtitle">Inscription Professionel</h2>

    <div class="cadrement">
        <?php $form= new Form(); ?>
        <form action="#" method="post">
            <?php
            $html = $form->label('nom_entreprise', 'Nom entreprise *','labpro');
            $html .= $form->input('text','nom_entreprise','inspro');
            $html .= '<span class="error">' . $errors['nom_entreprise'] . $errors['rep'] . '</span>';
            $html .= $form->label('mail', 'E-mail *','labpro');
            $html .= $form->input('email','mail','inspro');
            $html .= '<span class="error">' . $errors['mail'] . '</span>';
            $html .= $form->label('adresse1', 'Adresse *','labpro');
            $html .= $form->input('text','adresse1','inspro');
            $html .= '<span class="error">' . $errors['adresse1'] . '</span>';
            $html .= $form->label('adresse2', 'Seconde adresse','labpro');
            $html .= $form->input('text','adresse2','inspro');
            $html .= '<span class="error">' . $errors['adresse2'] . '</span>';
            $html .= $form->label('adresse3', 'Troisième adresse','labpro');
            $html .= $form->input('text','adresse3','inspro');
            $html .= '<span class="error">' . $errors['adresse3'] . '</span>';
            $html .= $form->label('mot_de_passe', 'Mot de passe *','labpro');
            $html .= $form->input('password','mot_de_passe','inspro');
            $html .= '<span class="error">' . $errors['mot_de_passe'] . '</span>';
            $html .= $form->label('conf_mot_de_passe', 'Confirmez mot de passe *','labpro');
            $html .= $form->input('password','conf_mot_de_passe','inspro');
            $html .= '<span class="error">' . $errors['conf_mot_de_passe'] . $errors['mdp'] . '</span>';
            $html .= $form->label('tel_pro', 'Télephone professionel *','labpro');
            $html .= $form->input('tel','tel_pro','inspro');
            $html .= '<span class="error">' . $errors['tel_pro'] . '</span>';
            $html .= $form->label('raison_sociale', 'Raison sociale de l\'entreprise','labpro');
            $html .= $form->input('text','raison_sociale','inspro');
            $html .= '<span class="error">' . $errors['raison_sociale'] . '</span>';
            $html .= $form->label('ville', 'Ville','labpro');
            $html .= $form->input('text','ville','inspro');
            $html .= '<span class="error">' . $errors['ville'] . '</span>';
            $html .= $form->label('cp', 'Code Postale','labpro');
            $html .= $form->input('number','cp','inspro');
            $html .= '<span class="error">' . $errors['cp'] . '</span>';
            $html .= $form->submit('submited','Envoyer', 'envoiepro');

            echo $html;
            ?>
        </form>
    </div>
<?php
get_footer();

