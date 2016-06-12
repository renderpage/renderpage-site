<?php
namespace app\controllers;

use renderpage\libs\Controller;
use app\models\Doc;

class DocController extends Controller
{
    /**
     * SiteController trait
     */
    use \app\traits\SiteController;

    /**
     * Index.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->navbar->activeItem = 'doc';

        $doc = new Doc;

        $this->view->setVar('title', $this->language->_('doc', 'title'));
        $this->view->setVar('navbar', $this->navbar->items);
        $this->view->setVar('contents', $doc->contents);

        return $this->view->render('doc/index');
    }
}
