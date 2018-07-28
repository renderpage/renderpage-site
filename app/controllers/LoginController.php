<?php

namespace app\controllers;

class LoginController extends CommonController {

    /**
     * Index.
     *
     * @return mixed
     */
    public function actionIndex() {
        if ($this->auth->isAuthorized) {
            return $this->redirect('/');
        }

        if ($this->request->isPost) {
            $results = $this->auth->login();
            if ($results['success']) {
                $this->redirect('/');
            }
            $errorMessages = [];
            foreach ($results['errors'] as $error) {
                $errorMessages[$error['inputName']] = $error['message'];
            }
            $this->view->assign('errorMessages', $errorMessages);
            $this->view->assign('email', filter_input(INPUT_POST, 'email'));
        }

        $this->view->title = $this->language->_('login', 'title');

        return $this->view->render('login', 'minimal');
    }

}
