<?php
namespace FormBuilder;

use \Fram\AllowedFileExtValidator;
use \Fram\FileField;
use \Fram\FormBuilder;
use \Fram\MaxSizeValidator;
use Fram\NotNullFileValidator;
use \Fram\StringField;
use \Fram\TextField;
use \Fram\MaxLengthValidator;
use \Fram\NotNullValidator;

class BilletFormBuilder extends FormBuilder
{
    public function build()
    {
        $this->form->add(new StringField([
            'label' => 'Auteur',
            'name' => 'auteur',
            'maxLength' => 30,
            'validators' => [
                new MaxLengthValidator('L\'auteur spécifié est trop long (30 caractères maximum)', 30),
                new NotNullValidator('Merci de spécifier l\'auteur du billet'),
            ],
        ]))
            ->add(new StringField([
                'label' => 'Titre',
                'name' => 'titre',
                'maxLength' => 100,
                'validators' => [
                    new MaxLengthValidator('Le titre spécifié est trop long (100 caractères maximum)', 100),
                    new NotNullValidator('Merci de spécifier le titre du billet'),
                ],
            ]))
            ->add(new TextField([
                'label' => 'Contenu',
                'name' => 'contenu',
                'rows' => 8,
                'cols' => 60,
                'id' => 'mytextarea',
                'validators' => [
                    new NotNullValidator('Merci de spécifier le contenu du billet'),
                ],
            ]))
            ->add(new FileField([
                'label' => 'Bannière',
                'name' => 'banniere',
                'accept' => 'image/*',
                'maxSize' => 10000000,
                'validators' => [
                    new NotNullFileValidator('Merci de selectionner un fichier'),
                    new AllowedFileExtValidator('L\'extension du fichier est incorrect'),
                    new MaxSizeValidator('La taille du fichier n\'est pas respectée (10 Mo maximum)',10000000),
                ],
            ]));
    }
}