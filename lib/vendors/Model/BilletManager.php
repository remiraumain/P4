<?php
/**
 * Created by PhpStorm.
 * User: remiraumain
 * Date: 2019-02-06
 * Time: 16:44
 */

namespace Model;

use \OCFram\Manager;
use \Entity\Billet;

abstract class BilletManager extends Manager
{
    /**
     * Méthode permettant d'ajouter un billet.
     * @param $billet Billet le billet à ajouter
     * @return void
     */
    abstract protected function add(Billet $billet);

    /**
     * Méthode permettant d'enregistrer un billet.
     * @param $billet Billet le billet à enregistrer
     * @see self::add()
     * @see self::modify()
     * @return void
     */
    public function save(Billet $billet)
    {
        if ($billet->isValid())
        {
            $billet->isNew() ? $this->add($billet) : $this->modify($billet);
        }
        else
        {
            throw new \RuntimeException('Le billet doit être validé pour être enregistrée');
        }
    }

    /**
     * Méthode renvoyant le nombre de billets total.
     * @return int
     */
    abstract public function count();

    /**
     * Méthode permettant de supprimer un billet.
     * @param $id int L'identifiant du billet à supprimer
     * @return void
     */
    abstract public function delete($id);

    /**
     * Méthode retournant une liste de billet demandé.
     * @param $debut int Le premier billet à sélectionner
     * @param $limite int Le nombre de billet à sélectionner
     * @return array La liste des billets. Chaque entrée est une instance de Billet.
     */
    abstract public function getList($debut = -1, $limite = -1);

    /**
     * Méthode retournant un billet précis.
     * @param $id int L'identifiant du billet à récupérer
     * @return Billet Le billet demandé
     */
    abstract public function getUnique($id);

    /**
     * Méthode permettant de modifier un billet.
     * @param $billet Billet le billet à modifier
     * @return void
     */
    abstract protected function modify(Billet $billet);
}