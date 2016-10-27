<?php
namespace app\controllers;

use app\models\Doc;

class TestController extends CommonController
{
    /**
     * Index.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        \renderpage\libs\RenderPage::$forceCompile = true;

        $this->navbar->activeItem = 'doc';

        $doc = new Doc;

        $breadcrumb = [
            ['url' => '/', 'text' => $this->language->_('navbar', 'index')],
            ['url' => '/doc', 'text' => $this->language->_('navbar', 'doc')],
            ['url' => '/doc/test', 'text' => 'Методы класса View'],
            ['url' => '/doc/test', 'text' => 'render()']
        ];

        $this->view->addCss('doc.css');

        $this->view->setVar('title', $this->language->_('doc', 'title'));
        $this->view->setVar('navbar', $this->navbar->items);
        $this->view->setVar('contents', $doc->contents);
        $this->view->setVar('breadcrumb', $breadcrumb);
        $this->view->setVar('refentry', $doc->refentry);

        return $this->view->render('doc/method');
    }
}
