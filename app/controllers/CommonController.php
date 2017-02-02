<?php
namespace app\controllers;

use renderpage\libs\Controller;
use app\models\{AccessLog, Navbar, Auth};

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
    public function before()
    {
        $this->navbar = new Navbar;
        $this->auth = new Auth;

        // Styles
        $this->view->addCss('renderpage.css');
        $this->view->addCss('default.css');
        $this->view->addCss('navbar.css');

        // Scripts
        $this->view->addScript('renderpage.js');
        $this->view->addScript('navbar.js');

        $languages = [
            [
                'active' => $this->language->code == 'en-us',
                'href' => 'http://renderpage.org' . $_SERVER['REQUEST_URI'],
                'text' => 'English'
            ],
            [
                'active' => $this->language->code == 'ru-ru',
                'href' => 'http://ru.renderpage.org' . $_SERVER['REQUEST_URI'],
                'text' => 'Русский'
            ],
        ];

        
        $this->view->setVar('isAuthorized', $this->auth->isAuthorized);
        if ($this->auth->user) {
            $this->view->setVar('authUserEmail', $this->auth->user->email);
        }
        $this->view->setVar('lang', $this->language->code);
        $this->view->setVar('languages', $languages);
        $this->view->setVar('year', date('Y'));

        $accessLog = new AccessLog;
        $accessLog->write();
    }
}
