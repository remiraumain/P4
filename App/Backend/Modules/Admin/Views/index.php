<?php if (!empty($listeBilletsAdmin)){ ?>
<h2 class="center">Admin</h2>
<div class="row">
    <div class="card-panel">
        <p style="text-align: center">Il y a actuellement <?php echo $nombreBilletsAdmin . ' '; if ($nombreBilletsAdmin > 1) {echo 'billets';} else {echo 'billet';} ?>. En voici la liste :</p>
    <table class="responsive-table centered col-content">
        <thead>
        <tr class=""><th>Auteur</th><th>Titre</th><th>Date d'ajout</th><th>Dernière modification</th><th>Action</th></tr>
        </thead>
        <?php
        foreach ($listeBilletsAdmin as $billet)
        {
            echo '<tr><td>', $billet['auteur'], '</td><td>', $billet['titre'], '</td><td>le ', $billet['dateAjout']->format('d/m/Y à H\hi'), '</td><td>', ($billet['dateAjout'] == $billet['dateModif'] ? '-' : 'le '.$billet['dateModif']->format('d/m/Y à H\hi')), '</td><td><a href="billet-update-', $billet['id'], '.html"><i class="fas fa-pen"></i></a> <a href="billet-delete-', $billet['id'], '.html"><i class="fas fa-times" ></i></a></td></tr>', "\n";
        }
        ?>
    </table>
        </div>
    <?php } else { ?>
        <h2>Oops</h2>
        <p>Il n'y a aucun billet...</p>
    <?php } ?>
    </div>
    <?php if (!empty($listeReportedComments)){ ?>
<div class="row">
    <div class="card-panel">
    <p style="text-align: center">Il y a actuellement <?php echo $nombreReportedComments . ' '; if ($nombreReportedComments > 1) {echo 'commentaires';} else {echo 'commentaire';} ?> signalés. En voici la liste :</p>
    <table class="responsive-table centered col-content">
        <thead>
    <tr><th>Auteur</th><th>Contenu</th><th>Date d'ajout</th><th>Billet (ID)</th><th>Action</th></tr>
    </thead>
    <?php
    foreach ($listeReportedComments as $comment)
    {
    echo '<tr><td>', $comment['auteur'], '</td><td>', $comment['contenu'], '</td><td>le ', $comment['date']->format('d/m/Y à H\hi'), '</td><td><a href="/billet-',$comment['billet'],'.html">', $comment['billet'], '</a></td><td><a href="comment-update-', $comment['id'], '.html"><i class="fas fa-pen"></i></a> <a href="comment-delete-', $comment['id'], '.html"><i class="fas fa-times" ></i></a></td></tr>', "\n";
    }?>
    </table>
    </div>
</div>
    <?php }

