<?php

include("template/header.php");

include("template/navbar.php");

?>




<div class="container">

    <div class="row">
        <?php if(isset($inscription_validated) && $inscription_validated === true){ ?>
        <div class="col s12">
            <div class='card-panel green white-text'>
                Votre inscription a bien été validée !
            </div>
        </div>

        <?php } else if(isset($inscription_validated) && $inscription_validated == "error"){ ?>
        <div class="col s12">
            <div class='card-panel red white-text'>
                Une erreur a eu lieu lors de l'inscription !
            </div>
        </div>
        <?php } ?>

        <div class="col s12 l9">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Les initiations jeu de rôles !</span>
                    Envie de découvrir le monde magique des jeu de rôles sur table? Vous êtes au bon endroit !<br/>
                    Nous organisons des initiations les derniers mardi de chaque mois (sauf cas particulier) pendant une soirée, de 20h15 a minuit, a la clé des songes.<br/>
                    Pour nous permettre une organisation fluide, nous vous demandons de bien vouloir vous inscrire via cette page a l'initiation vous intérressant,
                    en sachant que le formulaire ne s'ouvre que 1 semaine avant l'initiaition (pour éviter des oublis du a une inscription trop lointaine).
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <span class="card-title">Formulaire d'inscription</span>
                    Le formulaire pour la prochaine initiation n'est pas encore disponible, veuillez revenir le 28/03
                </div>
            </div>


            <div class="card">
                <div class="card-content">
                    <span class="card-title">Formulaire d'inscription</span>
                    <form class="row" method="post" action="/initiations">
                        <div class="input-field col l6 m6 s12">
                            <input name="name" id="name" type="text" class="validate" required>
                            <label for="name">Nom</label>
                        </div>
                        <div class="input-field col l6 m6 s12">
                            <input name="firstname" id="firstname" type="text" class="validate" required>
                            <label for="firstname">Prénom</label>
                        </div>
                        <div class="input-field col l6 m6 s12">
                            <input name="email" id="email" type="email" class="validate">
                            <label for="email">Adresse mail (optionnel)</label>
                        </div>
                        <div class="input-field col l6 m6 s12">
                            <input name="phone" id="phone" type="tel" class="validate">
                            <label for="phone">numéro de GSM (optionnel)</label>
                        </div>
                        <h7>A quel jeu de rôle voulez vous jouer?</h7>
                        <?php
                        $data = $initiation->getTables();
                        for($i = 0;$i<count($data);$i++) {
                            ?>
                        <div style="margin:10px;">
                            <input class="with-gap" name="game" type="radio" value="game<?php echo($i); ?>" id="game<?php echo($i); ?>" />
                            <label for="game<?php echo($i); ?>"><?php echo($data[$i][0]); ?></label>
                        </div>
                        <?php } ?>
                        <button class="btn waves-effect waves-light" type="submit" name="action" style="margin-top:10px;">
                            Envoyer l'inscription
                        </button>

                    </form>
                </div>
            </div>
        </div>
        <div class="col s12 l3">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">prochaines initiations</span>
                    Nos prochaines initiations se déroulent le :
                    <ul class="collection">
                        <li class="collection-item">21/02</li>
                        <li class="collection-item">21/03</li>
                        <li class="collection-item">24/04</li>
                    </ul>
                </div>
            </div>
        </div>



    </div>
</div>

<?php
include("template/footer.php");

?>