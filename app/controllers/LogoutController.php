<?php

namespace app\controllers;

class LogoutController extends CommonController {

    /**
     * Index.
     *
     * @return mixed
     */
    public function actionIndex() {
        $this->auth->logout();
        $this->response->redirect('/login');
        return '';
    }

}
