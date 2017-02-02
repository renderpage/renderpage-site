<?php
namespace app\controllers;

use app\models\Auth;

class ResetPasswordController extends CommonController
{
    /**
     * Index.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->view->setVar('title', $this->language->_('reset-password', 'title'));
        $this->view->setVar('navbar', $this->navbar->items);

        return $this->view->render('reset-password');
    }
}
