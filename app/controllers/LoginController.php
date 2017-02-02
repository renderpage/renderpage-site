<?php
namespace app\controllers;

use app\models\Auth;

class LoginController extends CommonController
{
    /**
     * Index.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        if ((new Auth)->isAuthorized) {
            return $this->redirect('/');
        }

        if (!empty($_POST)) {
            $results = (new Auth)->login($_POST);
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

        $this->view->setVar('title', $this->language->_('login', 'title'));

        return $this->view->render('login', 'auth');
    }
}
