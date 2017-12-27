<?php
    function createMenu()
    {
        ?>
        <li><a href="/">Acceuil</a></li>
        <li><a href="/initiations">Initiations</a></li>
        <li><a href="/about">A propos</a></li>
        <?php

    }
?>


<nav>
    <div class="nav-wrapper">
        <a href="#" class="brand-logo">Logo</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <?php createMenu(); ?>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <?php createMenu(); ?>
      </ul>
    </div>

</nav>
