<?php

namespace app\models;

use app\models\User;

class ResetPassword extends User {

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
                'message' => $this->_('reset-password', 'error-email-empty'),
                'inputName' => 'email'
            ];
            $this->response;
            return false;
        }
        if (!$email = filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->response['errors'][] = [
                'message' => $this->_('reset-password', 'error-email-invalid'),
                'inputName' => 'email'
            ];
            $this->response;
            return false;
        }
        return $email;
    }

    /**
     * Reset password.
     *
     * @return array
     */
    public function resetPassword() {
        if (!$email = $this->filterInputValidateEmail()) {
            return $this->response;
        }
        $user = $this->getByEmail($email);
        if (!$user) {
            $this->response['errors'][] = [
                'message' => $this->_('reset-password', 'error-email-not-found'),
                'inputName' => 'email'
            ];
            return $this->response;
        }
        // send mail
        return $this->response;
    }

}
