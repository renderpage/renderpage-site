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
            $this->view->setVar('errorMessages', $errorMessages);
            $this->view->setVar('email', filter_input(INPUT_POST, 'email'));
        }

        $this->view->setVar('title', $this->language->_('reset-password', 'title'));

        return $this->view->render('reset-password', 'auth');
    }

}
