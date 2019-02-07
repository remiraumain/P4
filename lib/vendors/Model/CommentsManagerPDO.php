<?php
/**
 * Created by PhpStorm.
 * User: remiraumain
 * Date: 2019-02-07
 * Time: 11:53
 */

namespace Model;

use \Entity\Comment;

class CommentsManagerPDO extends CommentsManager
{
    protected function add(Comment $comment)
    {
        $q = $this->dao->prepare('INSERT INTO `P4 - comments` SET billet = :billet, auteur = :auteur, contenu = :contenu, date = NOW()');

        $q->bindValue(':billet', $comment->billet(), \PDO::PARAM_INT);
        $q->bindValue(':auteur', $comment->auteur());
        $q->bindValue(':contenu', $comment->contenu());

        $q->execute();

        $comment->setId($this->dao->lastInsertId());
    }

    public function delete($id)
    {
        $this->dao->exec('DELETE FROM `P4 - comments` WHERE id = '.(int) $id);
    }

    public function deleteFromBillet($billet)
    {
        $this->dao->exec('DELETE FROM `P4 - comments` WHERE billet = '.(int) $billet);
    }

    public function getListOf($billet)
    {
        if (!ctype_digit($billet))
        {
            throw new \InvalidArgumentException('L\'identifiant du billet passé doit être un nombre entier valide');
        }

        $q = $this->dao->prepare('SELECT id, billet, auteur, contenu, date FROM `P4 - comments` WHERE billet = :billet');
        $q->bindValue(':billet', $billet, \PDO::PARAM_INT);
        $q->execute();

        $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');

        $comments = $q->fetchAll();

        foreach ($comments as $comment)
        {
            $comment->setDate(new \DateTime($comment->date()));
        }

        return $comments;
    }

    protected function modify(Comment $comment)
    {
        $q = $this->dao->prepare('UPDATE `P4 - comments` SET auteur = :auteur, contenu = :contenu WHERE id = :id');

        $q->bindValue(':auteur', $comment->auteur());
        $q->bindValue(':contenu', $comment->contenu());
        $q->bindValue(':id', $comment->id(), \PDO::PARAM_INT);

        $q->execute();
    }

    public function get($id)
    {
        $q = $this->dao->prepare('SELECT id, billet, auteur, contenu FROM `P4 - comments` WHERE id = :id');
        $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $q->execute();

        $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');

        return $q->fetch();
    }
}