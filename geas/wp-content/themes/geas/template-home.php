<?php
/* Template Name: Home */
get_header();

global $wpdb;
$errors = array();
$success = false;

if (!empty($_POST['submited'])) {
    $nom_entreprise = trim(strip_tags($_POST['nom_entreprise']));
    $email = trim(strip_tags($_POST['email']));
    $adresse1 = trim(strip_tags($_POST['adresse1']));
    $adresse2 = trim(strip_tags($_POST['adresse2']));
    $adresse3 = trim(strip_tags($_POST['adresse3']));
    $mdp = trim(strip_tags($_POST['mdp']));
    $confmdp = trim(strip_tags($_POST['confmdp']));
    $tel = trim(strip_tags($_POST['tel']));
    $rsociale = trim(strip_tags($_POST['rsociale']));
    $ville = trim(strip_tags($_POST['ville']));
    $cp = trim(strip_tags($_POST['cp']));
    $tel = trim(strip_tags($_POST['tel']));

    $val = new Validation();

    $errors['email'] = $val->emailValid($email);
    $errors['nom_entreprise'] = $val->textValid($nom_entreprise, 'nom_entreprise', 1, 255);
    $errors['adresse1'] = $val->textValid($adresse1, 'adresse1', 5, 255);
    $errors['adresse2'] = $val->textValid($adresse2, 'adresse2', 5, 255);
    $errors['adresse3'] = $val->textValid($adresse3, 'adresse3', 5, 255);
    $errors['mdp'] = $val->textValid($mdp, 'mdp', 10, 255);
    $errors['confmdp'] = $val->textValid($confmdp, 'confmdp', 10, 255);
    $errors['rsociale'] = $val->textValid($rsociale, 'rsociale', 5, 255);
    $errors['ville'] = $val->textValid($ville, 'ville', 1, 255);
    $errors['cp'] = $val->numberValid($cp, 4, 99999);
    $errors['tel'] = $val->numberValid($tel, 9, 9999999999);

    echo '<pre>';
    var_dump($errors);
    echo '</pre>';

    if ($val->IsValid($errors)) {

        $wpdb->insert(
            'geas_Professionel',
            array(
                'ID' => NULL,
                'nom_entreprise' => $nom_entreprise,
                'email' => $email,
                'adresse1' => $adresse1,
                'adresse2' => $adresse2,
                'adresse3' => $adresse3,
                'mdp' => $mdp,
                'confmdp' => $confmdp,
                'tel' => $tel,
                'rsociale' => $rsociale,
                'ville' => $ville,
                'cp' => $cp,
                'longitude' => NULL,
                'latitude' => NULL,
                'altitude' => NULL,
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
                '%s',
            )
        );

    }
}

?>
<h2 class="subtitle">Inscription Professionel</h2>

    <div class="cadrement">
        <form action="#" method="post">
            <label class="labpro" for="nom_entreprise">Nom Entreprsie *</label>
            <input class="inspro" type="text" id="nom_entreprise" name="nom_entreprise" placeholder="Nom Entreprise"/>
            <span class=""></span>
            <label class="labpro" for="email">E-mail *</label>
            <input class="inspro" type="email" id="email" name="email" placeholder="E-mail"/>
            <span class=""></span>
            <label class="labpro" for="adresse1">Adresse *</label>
            <input class="inspro" type="text" id="adresse1" name="adresse1" placeholder="Adresse"/>
            <span class=""></span>
            <label class="labpro" for="adresse2">adresse2</label>
            <input class="inspro" type="text" id="adresse2" name="adresse2" placeholder="Seconde Adresse"/>
            <span class=""></span>
            <label class="labpro" for="adresse3">adresse3</label>
            <input class="inspro" type="text" id="adresse3" name="adresse3" placeholder="Troisième Adresse"/>
            <span class=""></span>
            <label class="labpro" for="mdp">Mot de Passe *</label>
            <input class="inspro" type="text" id="mdp" name="mdp" placeholder="Mot de passe"/>
            <span class=""></span>
            <label class="labpro" for="confmdp">Confirmation de Mot de Passe *</label>
            <input class="inspro" type="text" id="confmdp" name="confmdp" placeholder="Confirmation du mot de passe"/>
            <span class=""></span>
            <label class="labpro" for="tel">Téléphone Pro *</label>
            <input class="inspro" type="tel" id="tel" name="tel" placeholder="Téléphone professionnel"/>
            <span class=""></span>
            <label class="labpro" for="rsociale">Raison Sociale *</label>
            <input class="inspro" type="text" id="rsociale" name="rsociale" placeholder="Raison sociale"/>
            <span class=""></span>
            <label class="labpro" for="ville">Ville *</label>
            <input class="inspro" type="text" id="ville" name="ville" placeholder="ex: Rouen"/>
            <span class=""></span>
            <label class="labpro" for="cp">Code Postal *</label>
            <input class="inspro" type="number" id="cp" name="cp" placeholder="ex: 76490"/>
            <span class=""></span>
            <input class="envoiepro" name="submited" value="Envoyer" type="submit">
        </form>
    </div>
<?php
get_footer();

