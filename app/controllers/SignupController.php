<?php

namespace app\controllers;

use vendor\pershin\renderpage\View;

class SignupController extends CommonController {

    /**
     * Index.
     *
     * @return mixed
     */
    public function actionIndex() {
        if ($this->auth->isAuthorized) {
            $this->response->redirect('/');
        }

        $this->view->title = $this->language->getText('signup', 'title');
        $this->view->assign('navbar', $this->navbar->items, View::SCOPE_LAYOUT);

        return $this->view->render('signup');
    }

}
