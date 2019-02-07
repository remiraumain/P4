<?php
namespace App\Frontend\Modules\Billet;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Comment;
use \FormBuilder\CommentFormBuilder;
use \OCFram\FormHandler;

class BilletController extends BackController
{
    public function executeIndex(HTTPRequest $request)
    {
        $nombreBillet = $this->app->config()->get('nombre_billet');
        $nombreCaracteres = $this->app->config()->get('nombre_caracteres');

        // On ajoute une définition pour le titre.
        $this->page->addVar('title', 'Liste des '.$nombreBillet.' derniers billets');

        // On récupère le manager des billets.
        $manager = $this->managers->getManagerOf('Billet');

        $listeBillets = $manager->getList(0, $nombreBillet);

        foreach ($listeBillets as $billet)
        {
            if (strlen($billet->contenu()) > $nombreCaracteres)
            {
                $debut = substr($billet->contenu(), 0, $nombreCaracteres);
                $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';

                $billet->setContenu($debut);
            }
        }

        // On ajoute la variable $listeBillets à la vue.
        $this->page->addVar('listeBillets', $listeBillets);
    }

    public function executeShow(HTTPRequest $request)
    {
        $billet = $this->managers->getManagerOf('Billet')->getUnique($request->getData('id'));

        if (empty($billet))
        {
            $this->app->httpResponse()->redirect404();
        }

        $this->page->addVar('title', $billet->titre());
        $this->page->addVar('billet', $billet);
        $this->page->addVar('comments', $this->managers->getManagerOf('Comments')->getListOf($billet->id()));
    }

    public function executeInsertComment(HTTPRequest $request)
    {
        // Si le formulaire a été envoyé.
        if ($request->method() == 'POST')
        {
            $comment = new Comment([
                'billet' => $request->getData('billet'),
                'auteur' => $request->postData('auteur'),
                'contenu' => $request->postData('contenu')
            ]);
        }
        else
        {
            $comment = new Comment;
        }

        $formBuilder = new CommentFormBuilder($comment);
        $formBuilder->build();

        $form = $formBuilder->form();

        $formHandler = new FormHandler($form, $this->managers->getManagerOf('Comments'), $request);

        if ($formHandler->process())
        {
            $this->app->user()->setFlash('Le commentaire a bien été ajouté, merci !');

            $this->app->httpResponse()->redirect('billet-'.$request->getData('billet').'.html');
        }

        $this->page->addVar('comment', $comment);
        $this->page->addVar('form', $form->createView());
        $this->page->addVar('title', 'Ajout d\'un commentaire');
    }
}