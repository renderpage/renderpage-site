<?php

namespace app\controllers;

class DocController extends CommonController {

    /**
     * Index.
     *
     * @return mixed
     */
    public function actionIndex() {
        $this->navbar->activeItem = 'doc';

        $breadcrumb = [
            'items' => [
                    ['url' => '/', 'text' => $this->language->_('navbar', 'index')],
                    ['url' => '/doc', 'text' => $this->language->_('navbar', 'doc')]
            ]
        ];

        $this->view->addCss('doc.css');

        $this->view->setVar('title', $this->language->_('doc', 'title'));
        $this->view->setVar('navbar', $this->navbar->items);
        $this->view->setVar('breadcrumb', $breadcrumb);

        return $this->view->render('doc/index');
    }

}
