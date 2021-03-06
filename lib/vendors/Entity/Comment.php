<?php
/**
 * Created by PhpStorm.
 * User: remiraumain
 * Date: 2019-02-07
 * Time: 11:44
 */

namespace Entity;

use \Fram\Entity;

class Comment extends Entity
{
    protected $billet,
        $auteur,
        $contenu,
        $date,
        $signaler;

    const AUTEUR_INVALIDE = 1;
    const CONTENU_INVALIDE = 2;

    public function isValid()
    {
        return !(empty($this->auteur) || empty($this->contenu));
    }

    public function setBillet($billet)
    {
        $this->billet = (int) $billet;
    }

    public function setAuteur($auteur)
    {
        if (!is_string($auteur) || empty($auteur))
        {
            $this->erreurs[] = self::AUTEUR_INVALIDE;
        }

        $this->auteur = $auteur;
    }

    public function setContenu($contenu)
    {
        if (!is_string($contenu) || empty($contenu))
        {
            $this->erreurs[] = self::CONTENU_INVALIDE;
        }

        $this->contenu = $contenu;
    }

    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    public function setSignaler($signaler)
    {
        $this->signaler = (int) $signaler;
    }

    public function billet()
    {
        return $this->billet;
    }

    public function auteur()
    {
        return $this->auteur;
    }

    public function contenu()
    {
        return $this->contenu;
    }

    public function date()
    {
        return $this->date;
    }

    public function signaler()
    {
        return $this->signaler;
    }
}