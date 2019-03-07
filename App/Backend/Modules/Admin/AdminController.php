<?php
/**
 * Created by PhpStorm.
 * User: remiraumain
 * Date: 2019-02-11
 * Time: 10:19
 */

namespace App\Backend\Modules\Admin;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
class AdminController extends \OCFram\BackController
{
    public function executeIndex()
    {
        $nombreBillets = $this->app->config()->get('nombre_billet');
        $this->page->addVar('listeBillets', $this->managers->getManagerOf('Billet')->getList(0, $nombreBillets));

        $this->page->addVar('title', 'Espace administrateur');

        $billetManager = $this->managers->getManagerOf('Billet');

        $this->page->addVar('listeBilletsAdmin', $billetManager->getList());
        $this->page->addVar('nombreBilletsAdmin', $billetManager->count());

        $commentsManager = $this->managers->getManagerOf('Comments');

        $this->page->addVar('listeReportedComments', $commentsManager->getReportList());
        $this->page->addVar('nombreReportedComments', $commentsManager->countReported());
    }
}