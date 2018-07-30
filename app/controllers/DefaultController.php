<?php

namespace app\controllers;

use renderpage\libs\View;

class DefaultController extends CommonController {

    /**
     * Index
     *
     * @return mixed
     */
    public function actionIndex() {
        $this->navbar->activeItem = 'index';

        $this->view->title = $this->language->getText('index', 'title');
        $this->view->assign('navbar', $this->navbar->items, View::SCOPE_LAYOUT);

        return $this->view->render('index');
    }

    /**
     * Contact
     *
     * @return mixed
     */
    public function actionContact() {
        $this->navbar->activeItem = 'contact';

        $this->view->title = $this->language->getText('contact', 'title');
        $this->view->assign('navbar', $this->navbar->items, View::SCOPE_LAYOUT);

        return $this->view->render('contact');
    }

    /**
     * Downloads
     *
     * @return mixed
     */
    public function actionDownload() {
        $this->navbar->activeItem = 'download';

        $this->view->title = $this->language->getText('download', 'title');
        $this->view->assign('navbar', $this->navbar->items, View::SCOPE_LAYOUT);

        return $this->view->render('downloads');
    }

}
