<?php

namespace app\controllers;

use renderpage\libs\View;

class DocController extends CommonController {

    /**
     * Index.
     *
     * @return mixed
     */
    public function actionIndex() {
        $this->navbar->activeItem = 'doc';

        $breadcrumb = [
            ['url' => '/', 'text' => $this->language->_('navbar', 'index')],
            ['url' => '/doc', 'text' => $this->language->_('navbar', 'doc')]
        ];

        $this->view->title = $this->language->_('doc', 'title');
        $this->view->assign('navbar', $this->navbar->items, View::SCOPE_LAYOUT);
        $this->view->assign('breadcrumb', $breadcrumb, View::SCOPE_LAYOUT);

        return $this->view->render('doc' . DIRECTORY_SEPARATOR . 'index');
    }

}
