<?php

namespace app\models;

use vendor\pershin\renderpage\Model;
use app\models\Auth;

class Navbar extends Model {

    /**
     * Active item
     *
     * @var string
     */
    public $activeItem = '';

    /**
     * Get items
     *
     * @return array
     */
    public function getItems() {
        $items['index'] = ['url' => '/', 'text' => $this->language->getText('navbar', 'index')];
        $items['download'] = ['url' => '/download', 'text' => $this->language->getText('navbar', 'downloads')];
        $items['doc'] = ['url' => '/doc', 'text' => $this->language->getText('navbar', 'doc')];
        $items['contact'] = ['url' => '/contact', 'text' => $this->language->getText('navbar', 'contact')];

        $items[] = ['isSeparator' => true, 'class' => 'mobile-only'];

        $auth = new Auth;
        if ($auth->isAuthorized) {
            $items['logout'] = ['url' => '/logout', 'text' => $this->language->getText('navbar', 'logout'), 'class' => 'mobile-only'];
        } else {
            $items['login'] = ['url' => '/login', 'text' => $this->language->getText('navbar', 'login'), 'class' => 'mobile-only'];
        }

        if ($this->activeItem != '') {
            $items[$this->activeItem]['class'] = 'active';
        }

        return $items;
    }

}
