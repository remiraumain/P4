<?php
/**
 * Created by PhpStorm.
 * User: remiraumain
 * Date: 2019-02-06
 * Time: 16:52
 */

namespace Model;

use \Entity\Billet;

class BilletManagerPDO extends BilletManager
{
    protected function add(Billet $billet)
    {
        $requete = $this->dao->prepare('INSERT INTO `P4 - billets` SET auteur = :auteur, titre = :titre, contenu = :contenu, dateAjout = NOW(), dateModif = NOW()');

        $requete->bindValue(':titre', $billet->titre());
        $requete->bindValue(':auteur', $billet->auteur());
        $requete->bindValue(':contenu', $billet->contenu());

        $requete->execute();
    }

    public function count()
    {
        return $this->dao->query('SELECT COUNT(*) FROM `P4 - billets`')->fetchColumn();
    }

    public function delete($id)
    {
        $this->dao->exec('DELETE FROM P4 - billets WHERE id = '.(int) $id);
    }

    public function getList($debut = -1, $limite = -1)
    {
        $sql = 'SELECT id, auteur, titre, contenu, dateAjout, dateModif FROM `P4 - billets` ORDER BY id DESC';

        if ($debut != -1 || $limite != -1)
        {
            $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
        }

        $requete = $this->dao->query($sql);
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Billet');

        $listeBillets = $requete->fetchAll();

        foreach ($listeBillets as $billet)
        {
            $billet->setDateAjout(new \DateTime($billet->dateAjout()));
            $billet->setDateModif(new \DateTime($billet->dateModif()));
        }

        $requete->closeCursor();

        return $listeBillets;
    }

    public function getUnique($id)
    {
        $requete = $this->dao->prepare('SELECT id, auteur, titre, contenu, dateAjout, dateModif FROM `P4 - billets` WHERE id = :id');
        $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $requete->execute();

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Billet');

        if ($billet = $requete->fetch())
        {
            $billet->setDateAjout(new \DateTime($billet->dateAjout()));
            $billet->setDateModif(new \DateTime($billet->dateModif()));

            return $billet;
        }

        return null;
    }

    protected function modify(Billet $billet)
    {
        $requete = $this->dao->prepare('UPDATE `P4 - billets` SET auteur = :auteur, titre = :titre, contenu = :contenu, dateModif = NOW() WHERE id = :id');

        $requete->bindValue(':titre', $billet->titre());
        $requete->bindValue(':auteur', $billet->auteur());
        $requete->bindValue(':contenu', $billet->contenu());
        $requete->bindValue(':id', $billet->id(), \PDO::PARAM_INT);

        $requete->execute();
    }
}