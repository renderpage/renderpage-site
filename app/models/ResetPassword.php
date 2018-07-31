<?php

namespace app\models;

use \renderpage\libs\Model;

class ResetPassword extends Model {

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
                'message' => $this->language->getText('reset-password', 'error-email-empty')
            ];
            $this->response;
            return false;
        }
        if (!$email = filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->response['errors'][] = [
                'inputName' => 'email',
                'message' => $this->language->getText('reset-password', 'error-email-invalid')
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
        $user = User::getByEmail($email);
        if (!$user) {
            $this->response['errors'][] = [
                'inputName' => 'email',
                'message' => $this->language->getText('reset-password', 'error-email-not-found')
            ];
            return $this->response;
        }
        // send mail
        return $this->response;
    }

}
