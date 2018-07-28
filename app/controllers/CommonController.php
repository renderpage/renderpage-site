<?php

namespace app\controllers;

use renderpage\libs\{
    Controller,
    View
};
use app\models\{
    Navbar,
    Auth
};

class CommonController extends Controller {

    /**
     * Navbar (model) instance
     *
     * @var object
     */
    public $navbar;

    /**
     * Auth (model) instance
     *
     * @var object
     */
    protected $auth;

    /**
     * Before action.
     */
    public function before() {
        $this->navbar = new Navbar;
        $this->auth = new Auth;

        $hostWithoutGTLD = substr($this->request->host, 0, strrpos($this->request->host, '.'));
        $languages = [
            [
                'active' => $this->language->code == 'en-us',
                'href' => '//' . $hostWithoutGTLD . '.org' . $this->request->requestUri,
                'text' => 'English'
            ],
            [
                'active' => $this->language->code == 'ru-ru',
                'href' => '//' . $hostWithoutGTLD . '.ru' . $this->request->requestUri,
                'text' => 'Русский'
            ],
        ];

        $this->view->assign('isAuthorized', $this->auth->isAuthorized, View::SCOPE_LAYOUT);
        if ($this->auth->isAuthorized) {
            $this->view->assign('auth', $this->auth, View::SCOPE_LAYOUT);
        }

        $this->view->assign('lang', $this->language->code, View::SCOPE_LAYOUT);
        $this->view->assign('languages', $languages, View::SCOPE_LAYOUT);
    }

}
