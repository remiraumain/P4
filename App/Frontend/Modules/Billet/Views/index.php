<?php
/**
 * Created by PhpStorm.
 * User: remiraumain
 * Date: 2019-02-06
 * Time: 16:42
 */

foreach ($listeBillets as $billet)
{
    ?>
    <h2><a href="billet-<?= $billet['id'] ?>.html"><?= $billet['titre'] ?></a></h2>
    <p><?= nl2br($billet['contenu']) ?></p>
    <?php
}