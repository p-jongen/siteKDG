<div class="carousel">

    <?php
        $files = scandir($_SERVER['DOCUMENT_ROOT']."/public/carousel/");
        for($i = 2;$i<count($files);$i++)
        {
            echo('<a class="carousel-item"><img src="/public/carousel/');
            echo($files[$i]);
            echo('"></a>
            ');
        }



    ?>
</div>
