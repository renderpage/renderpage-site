<?php

namespace app\controllers;

use app\models\Auth;

class LogoutController extends CommonController {

    /**
     * Index.
     *
     * @return mixed
     */
    public function actionIndex() {
        (new Auth)->logout();
        return $this->redirect('/login');
    }

}
