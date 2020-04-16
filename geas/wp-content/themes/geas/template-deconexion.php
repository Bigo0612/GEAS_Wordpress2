<?php
/* Template Name: Deconnexion */
session_start();
$_SESSION = array();
session_destroy();
?>
<script type="text/javascript">
    <!--
    window.location.replace("../");
    -->
</script>

