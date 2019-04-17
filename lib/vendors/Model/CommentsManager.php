<?php
/**
 * Created by PhpStorm.
 * User: remiraumain
 * Date: 2019-02-07
 * Time: 11:51
 */

namespace Model;

use \Fram\Manager;
use \Entity\Comment;

abstract class CommentsManager extends Manager
{
    /**
     * Méthode permettant d'ajouter un commentaire.
     * @param $comment Le commentaire à ajouter
     * @return void
     */
    abstract protected function add(Comment $comment);

    /**
     * Méthode permettant de supprimer un commentaire.
     * @param $id L'identifiant du commentaire à supprimer
     * @return void
     */
    abstract public function delete($id);

    /**
     * Méthode permettant de supprimer tous les commentaires liés à un billet
     * @param $billet L'identifiant du billet dont les commentaires doivent être supprimés
     * @return void
     */
    abstract public function deleteFromBillet($billet);

    /**
     * Méthode permettant d'enregistrer un commentaire.
     * @param $comment Le commentaire à enregistrer
     * @return void
     */
    public function save(Comment $comment)
    {
        if ($comment->isValid())
        {
            $comment->isNew() ? $this->add($comment) : $this->modify($comment);
        }
        else
        {
            throw new \RuntimeException('Le commentaire doit être validé pour être enregistré');
        }
    }

    /**
     * Méthode permettant de récupérer une liste de commentaires.
     * @param $billet Le billet sur lequel on veut récupérer les commentaires
     * @return array
     */
    abstract public function getListOf($billet);

    /**
     * Méthode permettant de modifier un commentaire.
     * @param $comment Le commentaire à modifier
     * @return void
     */
    abstract protected function modify(Comment $comment);

    /**
     * Méthode permettant d'obtenir un commentaire spécifique.
     * @param $id L'identifiant du commentaire
     * @return Comment
     */
    abstract public function get($id);

    /**
     * Méthode permettant de signaler/valider un commentaire.
     * @param $comment Le commentaire à enregistrer
     * @return void
     */
    abstract public function report(Comment $comment);

    /**
     * Méthode permettant de récupérer une liste de commentaires signalés.
     * @return array
     */
    abstract public function getReportList();

    /**
     * Méthode renvoyant le nombre de commentaires total.
     * @return int
     */
    abstract public function count();

    /**
     * Méthode renvoyant le nombre de commentaires signalés au total.
     * @return int
     */
    abstract public function countReported();
}