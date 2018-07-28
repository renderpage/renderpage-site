<?php

namespace app\models;

use renderpage\libs\{
    DB,
    Model
};

class User extends Model {

    /**
     * The user's ID.
     *
     * @var int
     */
    public $id = -1;

    /**
     * The user's email.
     *
     * @var string
     */
    public $email = '';

    /**
     * The user's password (hashed).
     *
     * @var string
     */
    protected $password = '';

    /**
     * Gets the user by email
     *
     * @param string $email The user's email.
     *
     * @return \app\models\User|false
     */
    public static function getByEmail(string $email) {
        $user = false;
        $row = DB::getInstance()->getRow('SELECT * FROM `' . DB::$tablePrefix . 'users` WHERE `email` = ?', [$email]);
        if ($row) {
            $user = new self;
            $user->id = (int) $row['id'];
            $user->email = $row['email'];
            $user->password = $row['password'];
        }
        return $user;
    }

    /**
     * Gets the user by ID
     *
     * @param int $id The user's ID.
     *
     * @return \app\models\User|false
     */
    public static function getById(int $id) {
        $user = false;
        $row = DB::getInstance()->getRow('SELECT * FROM `' . DB::$tablePrefix . 'users` WHERE `id` = ?', [$id]);
        if ($row) {
            $user = new self;
            $user->id = (int) $row['id'];
            $user->email = $row['email'];
            $user->password = $row['password'];
        }
        return $user;
    }

    /**
     * Verifies that a password matches a hash
     *
     * @param string $password The user's password.
     *
     * @return bool Returns TRUE if the password and hash match, or FALSE otherwise.
     */
    public function passwordVerify(string $password): bool {
        return password_verify($password, $this->password);
    }

    /**
     * Creates a password hash
     *
     * @param string $password The user's password.
     *
     * @return bool Returns TRUE, or FALSE on failure.
     */
    public function setPassword(string $password): bool {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $sth = $this->db->query('UPDATE `' . DB::$tablePrefix . 'users` SET `password` = ? WHERE `id` = ' . $this->id, [$this->password]);
        return (bool) $sth->fetch();
    }

}
