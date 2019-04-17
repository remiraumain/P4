<?php if (!empty($allBillets)) { ?>
<div class="row grid">
    <?php
        foreach ($allBillets as $billet)
        {
            $banniere = $imageManager->getFrom($billet['id']);
    ?>
        <div class="col l6 m4 s12 grid-item">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="<?= $banniere['location'] ?>">
                    <div class="card-custom activator">
                        <h2 class="white-text font-custom center-align activator"><?= $billet['titre'] ?></h2>
                    </div>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4"><?= $billet['titre'] ?><i class="material-icons right">close</i></span>
                    <p><?= $billet['contenu'] ?></p>
                    <p><a class="waves-effect waves-light btn" href="/billet-<?= $billet['id'] ?>.html">Lire</a></p>
                </div>
            </div>
        </div>
        <?php } ?>
</div>
<?php } else {?>
    <h2>Oops</h2>
    <p>Il n'y a aucun billet...</p>
<?php } ?>