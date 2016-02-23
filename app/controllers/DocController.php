<?php
namespace app\controllers;

use renderpage\libs\Controller;
use app\models\Navbar;
use app\models\Doc;

class DocController extends Controller
{
    /**
     * Index.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $navbar = new Navbar;
        $navbar->activeItem = 'doc';

        $doc = new Doc;

        $this->view->setVar('title', 'RenderPage Documentation');
        $this->view->setVar('navbar', $navbar->items);
        $this->view->setVar('contents', $doc->contents);

        return $this->view->render('doc/index');
    }
}
