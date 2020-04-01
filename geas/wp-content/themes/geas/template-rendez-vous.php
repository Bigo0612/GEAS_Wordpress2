<?php
/* Template Name: Rendez-Vous */
get_header(); ?>
<div class="wrap">
    <h2>Les rendez-vous</h2>
        <table class="rdv">
            <thead>
            <tr>
                <th>id</th>
                <th>sujet</th>
                <th>email</th>
                <th>message</th>
                <th>date</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody id="the-list">
            <?php for ($i=0; $i < 5; $i++) { ?>
                <tr>
                    <td>bvfv</td>
                    <td>vf</td>
                    <td>vfvfb</td>
                    <td>bdf</td>
                    <td>fbvf,c</td>
                    <td>
                        <a href="">voir</a>
                    </td>
                </tr>
         <?php   } ?>

            </tbody>
        </table>
</div>



<?php
get_footer();