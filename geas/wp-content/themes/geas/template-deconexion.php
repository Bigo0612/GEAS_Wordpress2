<?php
/* Template Name: Deconnexion */
get_header();

global $wpdb;
session_start();
$_SESSION = array();
session_destroy();
header('Location: index.php');
?>
