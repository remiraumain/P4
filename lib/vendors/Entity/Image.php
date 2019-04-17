<?php
/**
 * Created by PhpStorm.
 * User: remiraumain
 * Date: 2019-02-21
 * Time: 14:59
 */

namespace Entity;

use \Fram\Entity;

class Image extends Entity
{
    protected $billet,
        $name,
        $tmp_name,
        $type,
        $error,
        $size,
        $location;

    const NAME_INVALIDE = 1;
    const TYPE_INVALIDE = 2;
    const SIZE_INVALIDE = 3;
    const ERROR_LOAD = 4;

    public function isValid()
    {
        return !(empty($this->name) || empty($this->tmp_name) || empty($this->type) || empty($this->size));
    }

    // SETTERS //

    public function setFile($données)
    {
        if (is_array($données))
        {
            $this->hydrate($données);
        }
    }

    public function setBillet($billet)
    {
        $this->billet = (int) $billet;
    }

    public function setName($name)
    {
        if (!is_string($name) || empty($name))
        {
            $this->erreurs[] = self::NAME_INVALIDE;
        }

        $this->name = $name;
    }

    public function setTmp_name($tmp_name)
    {
        if (!is_string($tmp_name) || empty($tmp_name))
        {
            $this->erreurs[] = self::ERROR_LOAD;
        }

        $this->tmp_name = $tmp_name;
    }

    public function setType($type)
    {
        if (!is_string($type) || empty($type))
        {
            $this->erreurs[] = self::TYPE_INVALIDE;
        }

        $this->type = $type;
    }

    public function setError($error)
    {
        if (!is_int($error))
        {
            $this->erreurs[] = self::ERROR_LOAD;
        }

        $this->error = $error;
    }

    public function setSize($size)
    {
        if (!is_int($size) || empty($size))
        {
            $this->erreurs[] = self::SIZE_INVALIDE;
        }

        $this->size = $size;
    }

    public function setLocation()
    {
        $fileName = $this->name;
        $fileTmpName = $this->tmp_name;

        $fileExtension = explode('.', $fileName);
        $fileActualExtension = strtolower(end($fileExtension));


        $fileNameNew = uniqid('', true) . "." . $fileActualExtension;
        $fileDestination = 'uploads/' . $fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);

        $this->location = $fileDestination;
    }

    // GETTERS //

    public function billet()
    {
        return $this->billet;
    }

    public function name()
    {
        return $this->name;
    }

    public function tmp_name()
    {
        return $this->tmp_name;
    }

    public function type()
    {
        return $this->type;
    }

    public function error()
    {
        return $this->error;
    }

    public function size()
    {
        return $this->size;
    }

    public function location()
    {
        return $this->location;
    }
}