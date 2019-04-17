
<div class="row">
<?php
if (!empty($listeBillets)) {
$billet = current($listeBillets);
$banniere = $imageManager->getFrom($billet['id']);
?>
    <h2 class="z-depth-4 center-align">Mon dernier billet</h2>
    <div class="col l8 m6 offset-l2">
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
</div>

<p>Projet Openclassrooms : </p>
<ul>
    <li>- Développer une application en PHP et avec une base de données MySQL</li>
    <li>- Interface frontend (lecture des billets)</li>
    <li>- Interface backend (administration des billets pour l'écriture)</li>
    <li>- CRUD (Create/Read/Update/Delete)</li>
    <li>- Ajout de commentaires, qui pourront être modérés dans l'interface d'administration</li>
    <li>- Les lecteurs doivent pouvoir "signaler" les commentaires</li>
    <li>- L'interface d'administration est protégée par mot de passe</li>
    <li>- La rédaction de billets se fait dans une interface WYSIWYG basée sur TinyMCE</li>
    <li>- Architecture MVC (Model/View/Controller)</li>
</ul>

<?php } else {?>
    <h2>Oops</h2>
    <p>Il n'y a aucun billet...</p>
<?php }?>