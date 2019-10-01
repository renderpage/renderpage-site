<?php

namespace app\models;

use vendor\pershin\renderpage\{
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
    private $password = '';

    /**
     * Users.
     *
     * @var \app\models\User[]
     */
    private static $users = [];

    /**
     * Gets the user by email
     *
     * @param string $email The user's email.
     *
     * @return \app\models\User|boolean
     */
    public static function getByEmail(string $email) {
        $sth = DB::getInstance()->query('SELECT * FROM `' . DB::$tablePrefix . 'users` WHERE `email` = ?', [$email]);
        $user = $sth->fetchObject(__CLASS__);
        if ($user) {
            self::$users[$user->id] = $user;
        }
        return $user;
    }

    /**
     * Gets the user by ID
     *
     * @param int $id The user's ID.
     *
     * @return \app\models\User|boolean
     */
    public static function getById(int $id) {
        if (!isset(self::$users[$id])) {
            $sth = DB::getInstance()->query('SELECT * FROM `' . DB::$tablePrefix . 'users` WHERE `id` = ?', [$id]);
            $user = $sth->fetchObject(__CLASS__);
            self::$users[$id] = $user;
        }
        return self::$users[$id];
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
