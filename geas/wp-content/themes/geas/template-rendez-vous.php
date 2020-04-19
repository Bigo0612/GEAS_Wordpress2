<?php
/* Template Name: rendez-vous */
session_start();
get_header();
$id_pro = $_SESSION['id_Professionel'];
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

    $heure_debut = trim(strip_tags($_POST['heure_debut']));
    $heure_fin = trim(strip_tags($_POST['heure_fin']));
    $nb_repas = trim(strip_tags($_POST['nb_repas']));

    $val = new Validation();

    $errors['jour'] = $val->textValid($jour, 'jour', 4,10);
    //$errors['heure_debut'] = $val->numberValid($heure_debut,1,31);
    //$errors['$heure_fin'] =$val->numberValid(heure_fin,1,53);

   // echo '<pre>';
    //echo print_r($errors);
    //echo '</pre>';

    if ($val->IsValid($errors)) {


        $wpdb->insert(
            'geas_Jour_has_Professionel',
            array(
                'Jour_id_Jour' => NULL,
                'Professionel_id_Professionel' => NULL,
                'horaire_debut' => NULL,
                'horaire_fin' => NULL,
                'nb_place'  => 4,
                'jour' => NULL,

            ),
            array(

                '%s',

            )
        );?>
        <script type="text/javascript">
                <!--
       /* window.location.replace("LastProjet/GEAS/geas/Rendez-vous/");*/
                -->
            </script>
<?php
    }

}
$rdvs = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}rendezvous_has_Enfant INNER JOIN geas_rendezvous ON geas_rendezvous.id_rendezvous = geas_rendezvous_has_Enfant.rendezvous_id_rendezvous INNER JOIN  geas_Enfant ON geas_Enfant.id_Enfant = geas_rendezvous_has_Enfant.Enfant_id_Enfant" , OBJECT );
$args = array(
    'post_type'      => 'Rendez-vous',
    'post_status'    => 'publish',
    'posts_per_page' => 1,
    'order'          => 'DESC',
    'orderby'        => ''
);
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {

    while ($the_query->have_posts()) {
        $the_query->the_post();


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
                        <a href="LastProjet/GEAS/geas/Rendez-vous/details?id=<?php echo $rdv->id ?> ">voir</a>
                    </td>
                </tr>
            <?php   }
            ?>

            </tbody>
        </table>
        <?php
        }

        }
        wp_reset_postdata();
          ?>
        <div class="cadrement">
            <?php $form= new Form(); ?>
            <form action="#" method="post">
                <?php

                $html = $form->label('jour', 'Jour de la semaine', 'labpro');
                $html .= $form->input('date', 'jour', 'jour',);
                $html .= '<span class="error">'.$errors['$jour'].'</span>';
                $html .= $form->label('heure_debut','heure debut','labpro');
                $html .= $form->input('time','heure_debut','inspro');
                $html .= '<span class="error">'.$errors['$heure_debut'].'</span>';
                $html .= $form->label('heure_fin','Heure fin','labpro');
                $html .= $form->input('time','heure_fin','inspro');
                $html .= '<span class="error">'.$errors['$heure_fin'].'</span>';
                $html .= $form->label('nb_repas','Nombre de repas','labpro');
                $html .= $form->input('number','nb_repas','inspro');
                $html .= '<span class="error">'.$errors['$nb_repas'].'</span>';
                $html .= $form->submit('submitted', 'Envoyer', 'envoiepro');

                echo $html;
                ?>
                <div class="container">
                    <h3>Bootstrap Multi Select Date Picker</h3>
                    <input type="text" class="form-control date" placeholder="Pick the multiple dates" name="">
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
        $('.date').multiDatesPicker();
        </script>


<?php
get_footer();