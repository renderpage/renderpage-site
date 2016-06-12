<?php
namespace app\models;

use renderpage\libs\Model;

class AccessLog extends Model
{
    /**
     * Write log.
     */
    public function write()
    {
        $referer = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

        $this->db->insert('access', [
            'time' => date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']),
            'ip' => $_SERVER['REMOTE_ADDR'],
            'host' => $_SERVER['HTTP_HOST'],
            'request' => $_SERVER['REQUEST_URI'],
            'referer' => $referer,
            'agent' => $_SERVER['HTTP_USER_AGENT']
          ]
        );
    }
}
