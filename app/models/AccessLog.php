<?php

namespace app\models;

use renderpage\libs\Model;

class AccessLog extends Model {

    /**
     * Write log.
     */
    public function write() {
        $this->db->insert('access', [
            'time' => date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']),
            'ip' => $_SERVER['REMOTE_ADDR'],
            'host' => $_SERVER['HTTP_HOST'],
            'request' => $_SERVER['REQUEST_URI'],
            'referer' => !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '',
            'agent' => !empty($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : ''
                ]
        );
    }

}
