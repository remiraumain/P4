<?php
namespace App\Backend\Modules\Connexion;

use \Fram\BackController;
use \Fram\HTTPRequest;

class ConnexionController extends BackController
{
    public function executeIndex(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Connexion');

        if ($request->postExists('login'))
        {
            $login = $request->postData('login');
            $password = $request->postData('password');

            if ($login == $this->app->config()->get('login') && $password == $this->app->config()->get('pass'))
            {
                $this->app->user()->setAuthenticated(true);
                $this->app->httpResponse()->redirect('.');
            }
            else
            {
                $this->app->user()->setFlash('Le pseudo ou le mot de passe est incorrect.');
            }
        }
    }

    public function executeDisconnect()
    {
        session_start();

        // Suppression des variables de session et de la session
        $_SESSION = array();
        session_destroy();

        $this->app->httpResponse()->redirect('/');
    }
}