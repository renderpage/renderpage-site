<?php
namespace app\traits;

use app\models\AccessLog;
use app\models\Navbar;

trait SiteController {
    /**
     * Navbar (model) instance
     *
     * @var object
     */
    public $navbar;

    /**
     * Prepare controller.
     */
    public function prepare()
    {
        $this->navbar = new Navbar;

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

        $this->view->setVar('lang', $this->language->code);
        $this->view->setVar('languages', $languages);
        $this->view->setVar('year', date('Y'));
        
        $accessLog = new AccessLog;

        $accessLog->write();
    }
}
