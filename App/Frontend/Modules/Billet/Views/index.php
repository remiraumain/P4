
<div class="row">
<?php
foreach ($listeBillets as $billet)
{
    ?>
    <div class="col l6 m6 s12">
    <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="images/<?= $billet['banniere'] ?>">
            <div class="card-custom activator">
                <h2 class="white-text center-align activator"><?= $billet['titre'] ?></h2>
            </div>
        </div>
        <div class="card-reveal">
            <span class="card-title grey-text text-darken-4"><?= $billet['titre'] ?><i class="material-icons right">close</i></span>
            <p><?= $billet['contenu'] ?></p>
            <p><a class="waves-effect waves-light btn" href="/billet-<?= $billet['id'] ?>.html">Lire</a></p>
        </div>
    </div>
    </div>
    <?php
} ?>
</div>

