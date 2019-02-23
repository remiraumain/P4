<?php
/**
 * Created by PhpStorm.
 * User: remiraumain
 * Date: 2019-02-21
 * Time: 15:27
 */

namespace Model;

use \Entity\Image;

class ImageManagerPDO extends ImageManager
{
    protected function add(Image $image)
    {
        $q = $this->dao->prepare('INSERT INTO `P4 - images` SET billet = :billet, name = :name, tmp_name = :tmp_name, type = :type, error = :error, size = :size, location = :location');

        $q->bindValue(':billet', $image->billet(), \PDO::PARAM_INT);
        $q->bindValue(':name', $image->name());
        $q->bindValue(':tmp_name', $image->tmp_name());
        $q->bindValue(':type', $image->type());
        $q->bindValue(':error', $image->error());
        $q->bindValue(':size', $image->size());
        $q->bindValue(':location', $image->location());

        $q->execute();

        $image->setId($this->dao->lastInsertId());
    }

    public function delete($id)
    {
        $this->dao->exec('DELETE FROM `P4 - images` WHERE id = '.(int) $id);
    }

    public function deleteFromBillet($billet)
    {
        $this->dao->exec('DELETE FROM `P4 - images` WHERE billet = '.(int) $billet);
    }

    public function getFrom($billet)
    {
        if (!ctype_digit($billet))
        {
            throw new \InvalidArgumentException('L\'identifiant du billet passé doit être un nombre entier valide');
        }

        $q = $this->dao->prepare('SELECT id, billet, name, tmp_name, type, error, size, location FROM `P4 - images` WHERE billet = :billet');
        $q->bindValue(':billet', $billet, \PDO::PARAM_INT);
        $q->execute();

        $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Image');

        return $q->fetch();
    }

    public function get($id)
    {
        $q = $this->dao->prepare('SELECT id, billet, name, tmp_name, type, error, size, location FROM `P4 - images` WHERE id = :id');
        $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $q->execute();

        $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Image');

        return $q->fetch();
    }
}