<?php
/**
 * Created by PhpStorm.
 * User: Lazar Stanev
 * Date: 11/22/2017
 * Time: 6:35 PM
 */

namespace App\Http;


use App\Data\UserDTO;
use App\Service\UserServiceInterface;

class HttpUserHandler extends HttpAbstract
{
    public function register(UserServiceInterface $service, array $formData) {
        $_SESSION['error'] = null;
        $_SESSION['success'] = null;

        if( isset($formData['username']) &&
            isset($formData['password']) &&
            isset($formData['confirm_password']) &&
            isset($formData['first_name']) &&
            isset($formData['last_name']) &&
            isset($formData['register'])) {

            $user = $this->binder->bind(UserDTO::class, $_POST);

            try {
                if($service->register($user, $_POST['confirm_password'])) {
                    $_SESSION['success'] = 'Congratulations, you can now login to your account.';
                    $this->redirect('login');
                }
            } catch (\Exception $e) {
                $_SESSION['error'] = $e->getMessage();
                $this->render('Register');
            }

        } else {
            $this->render('Register');
        }
    }

    public function login(UserServiceInterface $service, $formData) {
        $_SESSION['error'] = null;
        $_SESSION['success'] = null;

        if( isset($formData['username']) &&
            isset($formData['password']) &&
            isset($formData['login'])) {
            try {
                $user = $service->login($formData['username'], $formData['password']);
                if( null != $user) {
                    $_SESSION['id'] = $user->getId();
                    $this->redirect('operations');
                }
            }
            catch (\Exception $e) {
                $_SESSION['error'] = $e->getMessage();
                $this->render('Login');
            }
        } else{
            $this->render('Login');
        }
    }
}