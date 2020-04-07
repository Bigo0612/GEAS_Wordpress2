<?php
/* Template Name: Deconnexion */
global $wpdb;
session_start();
$_SESSION = array();
session_destroy();
header('esc_url(home_url(\'/\')');
?>
