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
        $items['index'] = ['url' => '/', 'text' => 'Home'];
        $items['download'] = ['url' => '/download', 'text' => 'Downloads'];
        $items['doc'] = ['url' => '/doc', 'text' => 'Documentation'];
        $items['contact'] = ['url' => '/contact', 'text' => 'Contact'];

        if ($this->activeItem != '') {
            $items[$this->activeItem]['active'] = true;
        }

        return $items;
    }
}
