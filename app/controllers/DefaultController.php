<?php
namespace app\controllers;

use renderpage\libs\Controller;
use app\models\Navbar;

class DefaultController extends Controller
{
    /**
     * Navbar (model) instance
     *
     * @var object
     */
    public $navbar;

    /**
     * Prepare controller.
     */
    public function prepare()
    {
        $this->navbar = new Navbar;
    }

    /**
     * Index.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->navbar->activeItem = 'index';

        $this->view->setVar('title', 'RenderPage');
        $this->view->setVar('navbar', $this->navbar->items);

        return $this->view->render('index');
    }

    /**
     * Contact.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $this->navbar->activeItem = 'contact';

        $this->view->setVar('title', 'Contact RenderPage');
        $this->view->setVar('navbar', $this->navbar->items);

        return $this->view->render('contact');
    }

    /**
     * Downloads.
     *
     * @return mixed
     */
    public function actionDownload()
    {
        $this->navbar->activeItem = 'download';

        $this->view->setVar('title', 'RenderPage Downloads');
        $this->view->setVar('navbar', $this->navbar->items);

        return $this->view->render('downloads');
    }
}
