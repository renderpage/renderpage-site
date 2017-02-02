<?php
namespace app\models;

use renderpage\libs\Model;

class User extends Model
{
    public $id = -1;

    public $email = '';

    protected $password = ''; // md5

    /**
     * Get by Id.
     *
     * @param int $id User Id
     *
     * @return $this|false
     */
    public function getById(int $id)
    {
        $userRow = $this->db->getRow('SELECT * FROM `user` WHERE `id` = ?', [$id]);
        if ($userRow) {
            $this->id = $id;
            $this->email = $userRow['email'];
            $this->password = $userRow['password'];
            return $this;
        }
        return false;
    }

    /**
     * Get by e-mail.
     *
     * @param string $email User e-mail
     *
     * @return $this|false
     */
    public function getByEmail(string $email)
    {
        $userRow = $this->db->getRow('SELECT * FROM `user` WHERE `email` = ?', [$email]);
        if ($userRow) {
            $this->id = $userRow['id'];
            $this->email = $email;
            $this->password = $userRow['password'];
            return $this;
        }
        return false;
    }
}
