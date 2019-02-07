<p style="text-align: center">Il y a actuellement <?= $nombreBillet ?> billet. En voici la liste :</p>

<table>
    <tr><th>Auteur</th><th>Titre</th><th>Date d'ajout</th><th>Dernière modification</th><th>Action</th></tr>
    <?php
    foreach ($listeBillet as $billet)
    {
        echo '<tr><td>', $billet['auteur'], '</td><td>', $billet['titre'], '</td><td>le ', $billet['dateAjout']->format('d/m/Y à H\hi'), '</td><td>', ($billet['dateAjout'] == $billet['dateModif'] ? '-' : 'le '.$billet['dateModif']->format('d/m/Y à H\hi')), '</td><td><a href="billet-update-', $billet['id'], '.html"><i class="fas fa-pen"></i></a> <a href="billet-delete-', $billet['id'], '.html"><i class="fas fa-times" ></i></a></td></tr>', "\n";
    }
    ?>
</table>