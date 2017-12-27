<?php
/**
 * Arguments ;
 * $card_image, $card_title, $card_content, $card_link and $card_action
 */

 ?>


<div class="col l4 m6 s12">
    <div class="card medium">
        <div class="card-image">
            <img src="<?php echo($card_image); ?>">
            <span class="card-title">
                <?php echo($card_title);?>
            </span>
        </div>
        <div class="card-content">
            <p>
                <?php echo($card_content);?>
            </p>
        </div>
        <?php if(isset($card_action)) { ?>
            <div class="card-action">
                <a href="<?php echo($card_link); ?>"><?php echo($card_action); ?></a>
            </div>
        <?php } ?>
    </div>
</div>
