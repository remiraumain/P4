<?php
namespace FormBuilder;

use \OCFram\FormBuilder;
use \OCFram\StringField;
use \OCFram\TextField;
use \OCFram\MaxLengthValidator;
use \OCFram\NotNullValidator;

class BilletFormBuilder extends FormBuilder
{
    public function build()
    {
        $this->form->add(new StringField([
            'label' => 'Auteur',
            'name' => 'auteur',
            'maxLength' => 20,
            'validators' => [
                new MaxLengthValidator('L\'auteur spécifié est trop long (20 caractères maximum)', 20),
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
            ->add(new StringField([
                'label' => 'Bannière',
                'name' => 'banniere',
                'maxLength' => 200,
                'validators' => [
                    new MaxLengthValidator('L\'URL de bannière spécifié est trop long (200 caractères maximum)', 200),
                    new NotNullValidator('Merci de spécifier l\'URL de la bannière du billet'),
                ],
            ]));
    }
}