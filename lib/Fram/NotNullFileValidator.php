<?php
namespace Fram;

class NotNullFileValidator extends Validator
{
    public function isValid($value)
    {
        return $value['size'] != '';
    }
}