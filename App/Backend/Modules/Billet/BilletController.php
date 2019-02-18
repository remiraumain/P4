<?php
namespace App\Backend\Modules\Billet;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Billet;
use \Entity\Comment;
use \FormBuilder\CommentFormBuilder;
use \FormBuilder\BilletFormBuilder;
use \OCFram\FormHandler;

class BilletController extends BackController
{
    public function executeDelete(HTTPRequest $request)
    {
        $billetId = $request->getData('id');

        $this->managers->getManagerOf('Billet')->delete($billetId);
        $this->managers->getManagerOf('Comments')->deleteFromBillet($billetId);

        $this->app->user()->setFlash('Le billet a bien été supprimée !');

        $this->app->httpResponse()->redirect('.');
    }

    public function executeDeleteComment(HTTPRequest $request)
    {
        $this->managers->getManagerOf('Comments')->delete($request->getData('id'));

        $this->app->user()->setFlash('Le commentaire a bien été supprimé !');

        $this->app->httpResponse()->redirect('.');
    }

    public function executeInsert(HTTPRequest $request)
    {

        $this->processForm($request);

        $nombreBillets = $this->app->config()->get('nombre_billet');
        $this->page->addVar('listeBillets', $this->managers->getManagerOf('Billet')->getList(0, $nombreBillets));
        $this->page->addVar('title', 'Ajout d\'un billet');
    }

    public function executeUpdate(HTTPRequest $request)
    {
        $this->processForm($request);

        $this->page->addVar('title', 'Modification d\'un billet');

        $nombreBillets = $this->app->config()->get('nombre_billet');
        $this->page->addVar('listeBillets', $this->managers->getManagerOf('Billet')->getList(0, $nombreBillets));
    }

    public function executeUpdateComment(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Modification d\'un commentaire');

        $nombreBillets = $this->app->config()->get('nombre_billet');
        $this->page->addVar('listeBillets', $this->managers->getManagerOf('Billet')->getList(0, $nombreBillets));

        if ($request->method() == 'POST')
        {
            $comment = new Comment([
                'id' => $request->getData('id'),
                'auteur' => $request->postData('auteur'),
                'contenu' => $request->postData('contenu')
            ]);
        }
        else
        {
            $comment = $this->managers->getManagerOf('Comments')->get($request->getData('id'));
        }

        $formBuilder = new CommentFormBuilder($comment);
        $formBuilder->build();

        $form = $formBuilder->form();

        $formHandler = new FormHandler($form, $this->managers->getManagerOf('Comments'), $request);

        if ($formHandler->process())
        {
            $this->app->user()->setFlash('Le commentaire a bien été modifié');

            $this->app->httpResponse()->redirect('/admin/');
        }

        $this->page->addVar('form', $form->createView());
    }

    public function processForm(HTTPRequest $request)
    {
        if ($request->method() == 'POST')
        {
            $billet = new Billet([
                'auteur' => $request->postData('auteur'),
                'titre' => $request->postData('titre'),
                'contenu' => $request->postData('contenu'),
                'banniere' => $request->postData('banniere')
            ]);

            if ($request->getExists('id'))
            {
                $billet->setId($request->getData('id'));
            }
        }
        else
        {
            // L'identifiant du billet est transmis si on veut la modifier
            if ($request->getExists('id'))
            {
                $billet = $this->managers->getManagerOf('Billet')->getUnique($request->getData('id'));
            }
            else
            {
                $billet = new Billet;
            }
        }

        $formBuilder = new BilletFormBuilder($billet);
        $formBuilder->build();

        $form = $formBuilder->form();

        $formHandler = new FormHandler($form, $this->managers->getManagerOf('Billet'), $request);

        if ($formHandler->process())
        {
            $this->app->user()->setFlash($billet->isNew() ? 'Le billet a bien été ajoutée !' : 'Le billet a bien été modifiée !');

            $this->app->httpResponse()->redirect('/admin/');
        }

        $this->page->addVar('form', $form->createView());
    }
}