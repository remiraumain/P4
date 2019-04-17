<?php
/**
 * Created by PhpStorm.
 * User: remiraumain
 * Date: 2019-02-19
 * Time: 15:02
 */

namespace Fram;

class AllowedFileExtValidator extends Validator
{
    public function isValid($file)
    {
        $fileName = $file['name'];

        $fileExtension = explode('.', $fileName);
        $fileActualExtension = strtolower(end($fileExtension));

        $allowed = array('jpg', 'jpeg', 'png', 'gif');

        if (!in_array($fileActualExtension, $allowed))
        {
            return false;
        }

        return true;
    }
}