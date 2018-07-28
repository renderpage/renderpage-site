<?php

namespace app\models;

use renderpage\libs\Model;
use renderpage\libs\Session;
use app\models\User;

class Auth extends Model {

    public $user;
    private static $_isAuthorized = null;

    /**
     * Response
     * @var array
     */
    private $response = [
        'success' => false,
        'errors' => []
    ];

    /**
     * Gets e-mail from $_POST
     *
     * @return string|boolean Valid e-mail or FALSE
     */
    private function filterInputValidateEmail() {
        if (!$email = filter_input(INPUT_POST, 'email')) {
            $this->response['errors'][] = [
                'inputName' => 'email',
                'message' => $this->_('login', 'error-email-empty')
            ];
            $this->response;
            return false;
        }
        if (!$email = filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->response['errors'][] = [
                'inputName' => 'email',
                'message' => $this->_('login', 'error-email-invalid')
            ];
            $this->response;
            return false;
        }
        return $email;
    }

    /**
     * Is user auth.
     *
     * @return boolean
     */
    public function getIsAuthorized() {
        if (self::$_isAuthorized !== null) {
            return self::$_isAuthorized;
        }

        // Create instance of Session class
        $session = Session::getInstance();

        $userId = $session->get('userId');
        if ($userId > 0) {
            $this->user = User::getById($userId);
        }

        if ($this->user) {
            self::$_isAuthorized = true;
            return true;
        }

        self::$_isAuthorized = false;

        return false;
    }

    /**
     * Log in.
     *
     * @return array
     */
    public function login() {
        if (!$email = $this->filterInputValidateEmail()) {
            return $this->response;
        }
        $user = User::getByEmail($email);
        if (!$user) {
            $this->response['errors'][] = [
                'inputName' => 'email',
                'message' => $this->_('login', 'error-user-not-found')
            ];
            return $this->response;
        }
        if (!$password = filter_input(INPUT_POST, 'password')) {
            $this->response['errors'][] = [
                'inputName' => 'password',
                'message' => $this->_('login', 'error-password-empty')
            ];
            return $this->response;
        }
        if ($user->passwordVerify($password)) {
            Session::getInstance()->set('userId', $user->id);
            $this->response['success'] = true;
        } else {
            $this->response['errors'][] = [
                'inputName' => 'password',
                'message' => $this->_('login', 'error-password-incorrect')
            ];
        }
        return $this->response;
    }

    /**
     * logout.
     *
     * @return boolean
     */
    public function logout() {
        // Create instance of Session class
        $session = Session::getInstance();
        $session->del('userId');
        self::$_isAuthorized = false;
        return true;
    }

}
