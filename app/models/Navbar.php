<?php
namespace app\models;

use renderpage\libs\Model;

class Navbar extends Model
{
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
    public function getItems()
    {
        $items['index'] = ['url' => '/', 'text' => $this->language->_('navbar', 'index')];
        $items['download'] = ['url' => '/download', 'text' => $this->language->_('navbar', 'downloads')];
        $items['doc'] = ['url' => '/doc', 'text' => $this->language->_('navbar', 'doc')];
        $items['contact'] = ['url' => '/contact', 'text' => $this->language->_('navbar', 'contact')];

        if ($this->activeItem != '') {
            $items[$this->activeItem]['active'] = true;
        }

        return $items;
    }
}
