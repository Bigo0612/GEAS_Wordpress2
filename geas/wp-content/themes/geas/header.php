<?php global $web;
function is_logged()
{

    if(!empty($_SESSION['nom_entreprise'])) {
       if(!empty($_SESSION['id_Professionel']) && is_numeric($_SESSION['id_Professionel'])) {
            if(!empty($_SESSION['mail'])) {
                if(!empty($_SESSION['ip'])) {
                    if($_SESSION['ip'] == $_SERVER['REMOTE_ADDR']) {
                                return true;
                   }
                }
            }
        }
    }
    return false;
}?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wonder</title>
    <meta name="description" content="">
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Arvo:400,700" rel="stylesheet">


    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


<header>
    <nav>
        <ul>
            <li class="active"><a href="<?php echo esc_url(home_url('/')) ?>" title="">Home</a></li>
            <?php if (!is_logged()) { ?>
            <li><a href="<?php echo esc_url(home_url($web['pages']['contact']['slug'])); ?>">Contact</a></li>
                <li><a href="<?php echo esc_url(home_url($web['pages']['connexion']['slug'])); ?>">Connexion</a></li>
            <?php } else { ?>
            <li><a href="<?php echo esc_url(home_url($web['pages']['rendez-vous']['slug'])); ?>">Rendez-Vous</a></li>
            <li><a href="<?php echo esc_url(home_url($web['pages']['paiement']['slug'])); ?>">Paiement</a></li>
            <li><a href="<?php echo esc_url(home_url($web['pages']['deconexion']['slug'])); ?>">Deconnexions</a></li>
            <?php } ?>
        </ul>
    </nav>

</header>