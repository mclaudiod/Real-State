<?php
    require "includes/functions.php";
    includeTemplate("header");
?>

    <main class="container section">
        <h1>Houses and Apartments on Sale</h1>

        <?php 
            
            $limit = 9;
            include "includes/templates/ads.php"
            
        ?>

    </main>

    <?php includeTemplate("footer"); ?>