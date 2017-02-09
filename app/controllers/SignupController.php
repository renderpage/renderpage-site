<?php

namespace app\controllers;

use app\models\Auth;

class SignupController extends CommonController {

    /**
     * Index.
     *
     * @return mixed
     */
    public function actionIndex() {
        if ($this->auth->isAuthorized) {
            return $this->redirect('/');
        }

        $this->view->setVar('title', $this->language->_('signup', 'title'));
        $this->view->setVar('navbar', $this->navbar->items);

        return $this->view->render('signup');
    }

}
