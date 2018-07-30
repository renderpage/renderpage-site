<?php

namespace app\controllers;

use app\models\ResetPassword;

class ResetPasswordController extends CommonController {

    /**
     * Index.
     *
     * @return mixed
     */
    public function actionIndex() {
        if ($this->request->isPost) {
            $result = (new ResetPassword)->resetPassword();
            $errorMessages = [];
            foreach ($result['errors'] as $error) {
                $errorMessages[$error['inputName']] = $error['message'];
            }
            $this->view->assign('errorMessages', $errorMessages);
            $this->view->assign('email', filter_input(INPUT_POST, 'email'));
        }

        $this->view->title = $this->language->getText('reset-password', 'title');

        return $this->view->render('reset-password', 'minimal');
    }

}
