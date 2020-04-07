<?php
/* Template Name: Deconnexion */
session_start();
$_SESSION = array();
session_destroy();
header(home_url('/'));

