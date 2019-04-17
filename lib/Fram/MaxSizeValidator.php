<?php
/**
 * Created by PhpStorm.
 * User: remiraumain
 * Date: 2019-02-19
 * Time: 15:02
 */

namespace Fram;

class MaxSizeValidator extends Validator
{
    protected $maxSize;

    public function __construct($errorMessage, $maxSize)
    {
        parent::__construct($errorMessage);

        $this->setMaxSize($maxSize);
    }

    public function isValid($value)
    {
        return $value['size'] <= $this->maxSize;
    }

    public function setMaxSize($maxSize)
    {
        $maxSize = (int) $maxSize;

        if ($maxSize > 0)
        {
            $this->maxSize = $maxSize;
        }
        else
        {
            throw new \RuntimeException('La taille maximale doit être un nombre supérieur à 0');
        }
    }
}