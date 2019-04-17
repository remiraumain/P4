<?php
/**
 * Created by PhpStorm.
 * User: remiraumain
 * Date: 2019-02-18
 * Time: 16:31
 */

namespace Fram;

class FileField extends Field
{
    protected $maxSize;
    protected $accept;

    public function buildWidget()
    {
        $widget = '';

        if (!empty($this->errorMessage))
        {
            $widget .= $this->errorMessage.'<br />';
        }

        $widget .= '<label>'.$this->label.'</label><input type="file" name="'.$this->name.'"';

        if (!empty($this->accept))
        {
            $widget .= ' accept="'.$this->accept.'"';
        }

        if (!empty($this->maxSize))
        {
            $widget .= ' maxSize="'.$this->maxSize.'"';
        }

        return $widget .= ' />';
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

    public function setAccept($value)
    {
        $accept = htmlspecialchars($value);

        $this->accept = $accept;
    }

    public function setValue($value)
    {
        if (is_object($value))
        {
            $this->value = $value;
        }
    }
}