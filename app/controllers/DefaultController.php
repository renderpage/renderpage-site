<?php

namespace app\controllers;

class DefaultController extends CommonController {

    /**
     * Index.
     *
     * @return mixed
     */
    public function actionIndex() {
        $this->navbar->activeItem = 'index';

        $this->view->setVar('title', $this->language->_('index', 'title'));
        $this->view->setVar('navbar', $this->navbar->items);

        return $this->view->render('index');
    }

    /**
     * Contact.
     *
     * @return mixed
     */
    public function actionContact() {
        $this->navbar->activeItem = 'contact';

        $this->view->setVar('title', $this->language->_('contact', 'title'));
        $this->view->setVar('navbar', $this->navbar->items);

        return $this->view->render('contact');
    }

    /**
     * Downloads.
     *
     * @return mixed
     */
    public function actionDownload() {
        $this->navbar->activeItem = 'download';

        $this->view->setVar('title', $this->language->_('download', 'title'));
        $this->view->setVar('navbar', $this->navbar->items);

        return $this->view->render('downloads');
    }

}
