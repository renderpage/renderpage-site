<?php
namespace app\controllers;

use renderpage\libs\Controller;
use app\models\Navbar;

class DefaultController extends Controller
{
    /**
     * Index.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $navbar = new Navbar;
        $navbar->activeItem = 'index';
        $this->view->setVar('navbar', $navbar->items);

        $this->view->setVar('title', 'RenderPage');
        return $this->view->render('index');
    }

    /**
     * Contact.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $navbar = new Navbar;
        $navbar->activeItem = 'contact';
        $this->view->setVar('navbar', $navbar->items);

        $this->view->setVar('title', 'Contact RenderPage');
        return $this->view->render('contact');
    }

    /**
     * Downloads.
     *
     * @return mixed
     */
    public function actionDownload()
    {
        $navbar = new Navbar;
        $navbar->activeItem = 'download';
        $this->view->setVar('navbar', $navbar->items);

        $this->view->setVar('title', 'RenderPage Downloads');
        return $this->view->render('downloads');
    }
}
