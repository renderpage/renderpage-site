<?php
namespace app\models;

use renderpage\libs\Session;
use app\models\User;

class ResetPassword extends User
{
    /**
     * Reset password.
     *
     * @return array
     */
    public function resetPassword()
    {
        $response = [
            'success' => false,
            'errors'  => []
        ];

        if (!$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
            if (empty($_POST['email'])) {
                $response['errors'][] = [
                    'message'   => $this->_('reset-password', 'error-email-empty'),
                    'inputName' => 'email'
                ];
            } else {
                $response['errors'][] = [
                    'message'   => $this->_('reset-password', 'error-email-invalid'),
                    'inputName' => 'email'
                ];
            }
            return $response;
        }

        $user = $this->getByEmail($email);
        if (!$user) {
            $response['errors'][] = [
                'message'   => $this->_('reset-password', 'error-email-not-found'),
                'inputName' => 'email'
            ];
            return $response;
        }

        return $response;
    }
}
