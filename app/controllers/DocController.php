<?php

namespace app\controllers;

use vendor\pershin\renderpage\View;

class DocController extends CommonController {

    /**
     * Index.
     *
     * @return mixed
     */
    public function actionIndex() {
        $this->navbar->activeItem = 'doc';

        $breadcrumb = [
            ['url' => '/', 'text' => $this->language->getText('navbar', 'index')],
            ['url' => '/doc', 'text' => $this->language->getText('navbar', 'doc')]
        ];

        $this->view->title = $this->language->getText('doc', 'title');
        $this->view->assign('navbar', $this->navbar->items, View::SCOPE_LAYOUT);
        $this->view->assign('breadcrumb', $breadcrumb, View::SCOPE_LAYOUT);

        return $this->view->render('doc' . DIRECTORY_SEPARATOR . 'index');
    }

}
