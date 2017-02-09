<?php
namespace app\controllers;

use app\models\ResetPassword;

class ResetPasswordController extends CommonController
{
    /**
     * Index.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        if (!empty($_POST)) {
            $results = (new ResetPassword)->resetPassword();
            if ($results['success']) {
                $this->redirect('/');
            }
            $errorMessages = [];
            foreach ($results['errors'] as $error) {
                $errorMessages[$error['inputName']] = $error['message'];
            }
            $this->view->setVar('errorMessages', $errorMessages);
            $this->view->setVar('email', $_POST['email']);
        }

        $this->view->setVar('title', $this->language->_('reset-password', 'title'));

        return $this->view->render('reset-password', 'auth');
    }
}
