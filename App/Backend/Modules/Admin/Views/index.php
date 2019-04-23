<?php if (!empty($listeBilletsAdmin)){ ?>
<h2 class="center">Admin</h2>
<div class="row">
    <div class="card-panel card-panel-custom">
        <p style="text-align: center">Il y a actuellement <?php echo $nombreBilletsAdmin . ' '; if ($nombreBilletsAdmin > 1) {echo 'billets';} else {echo 'billet';} ?>. En voici la liste :</p>
    <table class="centered col-content">
        <thead>
        <tr><th class="table-custom">Auteur</th><th>Titre</th><th>Date d'ajout</th><th class="hide-custom">Dernière modification</th><th>Action</th></tr>
        </thead>
        <?php
        foreach ($listeBilletsAdmin as $billet)
        {
            echo '<tr><td class="table-custom">', $billet['auteur'], '</td><td>', $billet['titre'], '</td><td>le ', $billet['dateAjout']->format('d/m/Y à H\hi'), '</td><td class="hide-custom">', ($billet['dateAjout'] == $billet['dateModif'] ? '-' : 'le '.$billet['dateModif']->format('d/m/Y à H\hi')), '</td><td><a href="/jeanforteroche/admin/billet-update-', $billet['id'], '.html"><i class="fas fa-pen"></i></a> <a href="/jeanforteroche/admin/billet-delete-', $billet['id'], '.html"><i class="fas fa-times" ></i></a></td></tr>', "\n";
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
    <table class="centered col-content">
        <thead>
    <tr><th class="table-custom">Auteur</th><th>Contenu</th><th class="hide-custom">Date d'ajout</th><th>Billet (ID)</th><th>Action</th></tr>
    </thead>
    <?php
    foreach ($listeReportedComments as $comment)
    {
    echo '<tr><td class="table-custom">', $comment['auteur'], '</td><td>', $comment['contenu'], '</td><td class="hide-custom">le ', $comment['date']->format('d/m/Y à H\hi'), '</td><td><a href="/jeanforteroche/billet-',$comment['billet'],'.html">', $comment['billet'], '</a></td><td><a href="/jeanforteroche/admin/comment-update-', $comment['id'], '.html"><i class="fas fa-pen"></i></a> <a href="/jeanforteroche/admin/comment-delete-', $comment['id'], '.html"><i class="fas fa-times" ></i></a> <a href="/jeanforteroche/admin/comment-validate-', $comment['id'], '.html"><i class="fas fa-check"></i></a></td></tr>', "\n";
    }?>
    </table>
    </div>
</div>
    <?php }

