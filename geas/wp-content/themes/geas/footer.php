<?php global $web; ?>
<footer>
    <div class="foot">
        <div class="footer-icons">
            <a href="#"><i class="fab fa-facebook-square"></i></a>
            <a href="#"><i class="fab fa-twitter-square"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-youtube-square"></i></a>
        </div>
        <p>&copy; 2020 - minigarde &reg;</p>
        <a href="<?= $view->path('mentionsLegales'); ?>">Mentions légales</a>
        <a href="<?= $view->path('cgu'); ?>">Conditions d'utilisation</a>
        <a href="<?= $view->path('contact'); ?>">Contact</a>
    </div>
</footer>

<script src="js/main.js'"></script>
<script src="https://kit.fontawesome.com/5d1ae1daad.js" crossorigin="anonymous"></script>

<?php wp_footer(); ?>

</body>
</html>