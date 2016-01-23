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
        $this->view->setVar('navbar', $navbar->items);

        $doc = new Doc;

        $contents = $doc->contents;

        $this->view->setVar('title', 'RenderPage Documentation');
        $this->view->setVar('activeMenuItem', 'doc');
        $this->view->setVar('contents', $contents);

        return $this->view->render('doc/index');
    }
}
