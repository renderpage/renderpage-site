<?php
namespace app\models;

use renderpage\libs\Session;
use app\models\User;

class Auth extends User
{
    private static $_isAuthorized = null;

    /**
     * Is user auth.
     *
     * @return boolean
     */
    public function getIsAuthorized()
    {
        if (self::$_isAuthorized !== null) {
            return self::$_isAuthorized;
        }

        // Create instance of Session class
        $session = Session::getInstance();

        $userId = $session->get('userId');
        if ($userId > 0) {            
            $this->getById($userId);
        }

        if ($this->id > 0) {
            self::$_isAuthorized = true;
            return true;
        }

        self::$_isAuthorized = false;

        return false;
    }


    /**
     * Log in.
     *
     * @param array $data _POST
     *
     * @return array
     */
    public function login(array $data)
    {
        $response = [
            'success' => false,
            'errors'  => []
        ];

        if (!$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
            if (empty($data['email'])) {
                $response['errors'][] = [
                    'message'   => $this->_('login', 'error-email-empty'),
                    'inputName' => 'email'
                ];
            } else {
                $response['errors'][] = [
                    'message'   => $this->_('login', 'error-email-invalid'),
                    'inputName' => 'email'
                ];
            }
            return $response;
        }

        $user = $this->getByEmail($email);
        if (!$user) {
            $response['errors'][] = [
                'message'   => $this->_('login', 'error-user-not-found'),
                'inputName' => 'email'
            ];
            return $response;
        }

        if (empty($data['password'])) {
            $response['errors'][] = [
                'message'   => $this->_('login', 'error-password-empty'),
                'inputName' => 'password'
            ];
            return $response;
        }

        $password = md5($data['password']);
        if ($user->password === $password) {
            Session::getInstance()->set('userId', $user->id);
            $response['success'] = true;
        } else {
            $response['errors'][] = [
                'message'   => $this->_('login', 'error-password-incorrect'),
                'inputName' => 'password'
            ];
        }

        return $response;
    }

    /**
     * logout.
     *
     * @return boolean
     */
    public function logout()
    {
        // Create instance of Session class
        $session = Session::getInstance();
        $session->del('userId');
        self::$_isAuthorized = false;
        return true;
    }    
}
