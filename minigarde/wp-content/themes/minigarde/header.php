<?php global $web; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wonder</title>
    <meta name="description" content="">

    <link href="https://fonts.googleapis.com/css?family=Arvo:400,700" rel="stylesheet">


    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


<header>
    <nav>
        <ul>
            <li class="active"><a href="<?php echo esc_url(home_url('/')) ?>" title="">Home</a></li>
            <li><a href="<?php echo esc_url(home_url($web['pages']['rendez-vous']['slug'])); ?>)) ?>">Rendez-Vous</a></li>
            <li><a href="<?php echo esc_url(home_url($web['pages']['contact']['slug'])); ?>)) ?>">Contact</a></li>
            <li><a href="<?php echo esc_url(home_url($web['pages']['paiement']['slug'])); ?>)) ?>">Paiement</a></li>
        </ul>
    </nav>
</header>