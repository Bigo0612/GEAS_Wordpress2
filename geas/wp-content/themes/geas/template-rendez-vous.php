<?php
/* Template Name: Rendez-Vous */
session_start();
get_header();
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/dubrox/Multiple-Dates-Picker-for-jQuery-UI/master/jquery-ui.multidatespicker.css" rel="stylesheet"/>
    <link href="https://code.jquery.com/ui/1.12.1/themes/pepper-grinder/jquery-ui.css" rel="stylesheet"/>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.rawgit.com/dubrox/Multiple-Dates-Picker-for-jQuery-UI/master/jquery-ui.multidatespicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<?php

global $wpdb;
$errors = array();
$success = false;
$joursem = array(
    array('jour' => 'lundi'),
    array('jour' => 'mardi'),
    array('jour' =>'mercredi'),
    array('jour' => 'jeudi'),
    array('jour' => 'vendredi'),
    array('jour' => 'samedi'),
    array('jour' => 'dimanche')
);

if (!empty($_POST['submitted'])) {

    $jour = trim(strip_tags($_POST['jour']));
    echo $jour;

    $journumero = trim(strip_tags($_POST['journumero']));
    $journumerosem = trim(strip_tags($_POST['journumerosem']));

    $val = new Validation();

   // $errors['jour'] = $val->textValid($jour, 'jour', 4,10);
    $errors['journumero'] = $val->numberValid($journumero,1,31);
    $errors['journumerosem'] =$val->numberValid($journumerosem,1,53);

    echo '<pre>';
    echo print_r($errors);
    echo '</pre>';

    if ($val->IsValid($errors)) {


        $wpdb->insert(
            'geas_Jour',
            array(
                'id_Jour' => NULL,
                'jour' => $jour,
                'journumero' => $journumero,
                'journumerosem' => $journumerosem,
            ),
            array(
                '%s',
                '%d',
                '%d'
            )
        );

    }

}
$rdvs = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}rendezvous_has_Enfant INNER JOIN geas_rendezvous ON geas_rendezvous.id_rendezvous = geas_rendezvous_has_Enfant.rendezvous_id_rendezvous INNER JOIN  geas_Enfant ON geas_Enfant.id_Enfant = geas_rendezvous_has_Enfant.Enfant_id_Enfant" , OBJECT );

?>
    <div class="wrap">


        <h2>Les rendez-vous</h2>
        <table class="rdv">
            <thead>
            <tr>
                <th>id enfant</th>
                <th>heure debut</th>
                <th>heure fin</th>
                <th>date rendez-vous</th>
                <th>jour semaine</th>
                <th>nom enfant</th>
                <th>prenom</th>
                <th>anniv</th>
                <th>age</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody id="the-list">
            <?php foreach ($rdvs as $rdv) { ?>
                <tr>
                    <td><?php echo $rdv->id_Enfant ?></td>
                    <td><?php echo $rdv->heure_debut ?></td>
                    <td><?php echo $rdv->heure_fin ?></td>
                    <td><?php echo $rdv->date_rendezvous ?></td>
                    <td><?php echo $rdv->jour_sem ?></td>
                    <td><?php echo $rdv->nom ?></td>
                    <td><?php echo $rdv->prenom ?></td>
                    <td><?php echo $rdv->date_Birth ?></td>
                    <td><?php echo $rdv->age ?></td>
                    <td>
                        <a href="<?php get_the_permalink()?>&single=<?= $rdv->id; ?>">voir</a>
                    </td>
                </tr>
            <?php   }
            $contact = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}rendezvous_has_Enfant ", OBJECT);

            ?>
            <h2>Profil</h2>
            <p>id: <?= $contact->id; ?></p>
            <p>sujet: <?= $contact->heure_debut; ?></p>
            <p>email: <?= $contact->heure_fin; ?></p>

            </tbody>
        </table>

        <div class="cadrement">
            <?php $form= new Form(); ?>
            <form action="#" method="post">
                <?php

               // $html = $form->label('jour', 'Jour de la semaine', 'labpro');
               // $html = $form->select2('jour', $joursem, 'jour','rt');
               // $html = '<span class="error"></span>';
                $html = $form->label('journumero','Jour dans le mois','labpro');
                $html .= $form->input('number','journumero','inspro');
                $html .= '<span class="error">'.$errors['$journumero'].'</span>';
                $html .= $form->label('journumerosem','Jour de la semaine','labpro');
                $html .= $form->input('number','journumerosem','inspro');
                $html .= '<span class="error">'.$errors['$journumerosem'].'</span>';
                $html .= $form->submit('submitted', 'Envoyer', 'envoiepro');

                echo $html;
                ?>
                <div class="container">
                    <h3>Bootstrap Multi Select Date Picker</h3>
                    <input type="text" class="form-control date" placeholder="Pick the multiple dates" name="jour">
                </div>

            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script
            src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
            crossorigin="anonymous"></script>


    <script>$('.date').datepicker({
            multidate: true,
            format: 'dd-mm-yyyy'
        });
        $('.date').multiDatesPicker();</script>


<?php
get_footer();