<?php

include("header.php");

include("navbar.php");

?>
<div class="container">
    <?php include("carousel.php");?>

    <div class="row">
        <div class="col l12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Le kot du grenier est la !</span>
                    <p style="margin-bottom:20px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel purus a leo ultricies pellentesque. Maecenas malesuada aliquet quam, ut facilisis urna maximus dictum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse at lorem ornare, aliquet mauris blandit, fermentum massa. Quisque suscipit tincidunt consectetur. Morbi sagittis magna justo, vitae mollis mi ultrices vel. Ut rhoncus augue at tellus semper, eu lacinia diam ornare. Morbi ac dolor posuere, condimentum ante ac, interdum nibh. Sed eget tellus consectetur, varius nisl vel, lacinia enim. Sed pretium mattis ex quis mattis. Maecenas ac dolor a nisl interdum mattis.</p>

                    <a href="https://www.facebook.com/kotdugrenier/" class="social" target="_blank">
                        <div class="chip">
                            <img src="/public/img/facebook.png" alt="Facebook">
                            Notre facebook
                        </div>
                    </a>
                    <a href="https://www.youtube.com/channel/UCr0kcxEZu7q9QyB-pJOtQrQ" class="social" target="_blank">
                        <div class="chip">
                            <img src="/public/img/youtube.png" alt="Youtube">
                            Notre chaine youtube
                        </div>
                    </a>
<!--
                    <div class="row">
                        <div class="col l6 m6 s12">
                            <img src="/public/img/facebook.png"/>
                            <a href="https://www.facebook.com/kotdugrenier/"> Notre page facebook</a>
                        </div>

                        <div class="col l6 m6 s12">
                            <img src="/public/img/youtube.png"/>
                            <a href="https://www.youtube.com/channel/UCr0kcxEZu7q9QyB-pJOtQrQ"> Notre chaine youtube</a>
                        </div>
                    </div>
                -->
                </div>
            </div>
        </div>
        <?php include("activity/ZN.php"); ?>
        <?php include("activity/permanance.php"); ?>
        <?php include("activity/initiation.php"); ?>
        <?php include("activity/tournoi.php"); ?>
    </div>
</div>


<?php
include("footer.php");

?>
