<p>Par <em><?= $billet['auteur'] ?></em>, le <?= $billet['dateAjout']->format('d/m/Y à H\hi') ?></p>
<h2><?= $billet['titre'] ?></h2>
<p><?= nl2br($billet['contenu']) ?></p>

<?php if ($billet['dateAjout'] != $billet['dateModif']) { ?>
    <p style="text-align: right;"><small><em>Modifiée le <?= $billet['dateModif']->format('d/m/Y à H\hi') ?></em></small></p>
<?php } ?>

<p><a href="commenter-<?= $billet['id'] ?>.html">Ajouter un commentaire</a></p>

<?php
if (empty($comments))
{
    ?>
    <p>Aucun commentaire n'a encore été posté. Soyez le premier à en laisser un !</p>
    <?php
}

foreach ($comments as $comment)
{
    ?>
    <fieldset>
        <legend>
            Posté par <strong><?= htmlspecialchars($comment['auteur']) ?></strong> le <?= $comment['date']->format('d/m/Y à H\hi') ?> -
            <a href="/comment-report-<?= $comment['id'] ?>.html">Signaler</a>
            <?php if ($user->isAuthenticated()) { ?> |
                <a href="admin/comment-update-<?= $comment['id'] ?>.html">Modifier</a> |
                <a href="admin/comment-delete-<?= $comment['id'] ?>.html">Supprimer</a>
            <?php } ?>
        </legend>
        <p><?= nl2br(htmlspecialchars($comment['contenu'])) ?></p>
    </fieldset>
    <?php
}
?>

