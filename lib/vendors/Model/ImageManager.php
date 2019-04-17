<?php
/**
 * Created by PhpStorm.
 * User: remiraumain
 * Date: 2019-02-21
 * Time: 15:27
 */

namespace Model;

use Entity\Image;
use \Fram\Manager;

abstract class ImageManager extends Manager
{
    /**
     * Méthode permettant d'ajouter une image.
     * @param $comment L'image à ajouter
     * @return void
     */
    abstract protected function add(Image $image);

    /**
     * Méthode permettant de supprimer une image.
     * @param $id L'identifiant de l'image à supprimer
     * @return void
     */
    abstract public function delete($id);

    /**
     * Méthode permettant de supprimer l'image liée à un billet
     * @param $billet L'identifiant du billet dont l'image doit être supprimé
     * @return void
     */
    abstract public function deleteFromBillet($billet);

    /**
     * Méthode permettant d'enregistrer une image.
     * @param $comment L'image à enregistrer
     * @return void
     */
    public function save(Image $image)
    {
        if ($image->isValid())
        {
            $image->isNew() ? $this->add($image) : $this->modify($image);
        }
        else
        {
            throw new \RuntimeException('L\'image doit être validé pour être enregistré');
        }
    }

    /**
     * Méthode permettant de récupérer une image.
     * @param $billet Le billet sur lequel on veut récupérer l'image
     * @return array
     */
    abstract public function getFrom($billet);

    /**
     * Méthode permettant d'obtenir une image spécifique.
     * @param $id L'identifiant de l'image
     * @return Image
     */
    abstract public function get($id);
}