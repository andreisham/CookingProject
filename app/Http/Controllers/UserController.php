<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAuthorizedUser() {
        echo '';
    }

    private array $users = [
        'admin' => 'admin',
        'user' => 'user'
    ];

    public function login() {
        $json = json_decode(file_get_contents('php://input'));
        $login = $this->users[$json->login] ?? null;
        $isLoginSuccessful = $login === $json->password;
        echo json_encode([
            'isLoginSuccessful' => $isLoginSuccessful,
            'errorMessage' => 'Invalid login/password',
            'login' => $json->login
        ]);
    }

    public function register() {
        $json = json_decode(file_get_contents('php://input'));
        $isRegistrationSuccessful = true;
        if (array_key_exists($json->login, $this->users)) {
            $isRegistrationSuccessful = false;
        }
        else {
            $this->users[$json->login] = $json->password;
        }
        echo json_encode([
            'isRegistrationSuccessful' => $isRegistrationSuccessful,
            'errorMessage' => 'This login is already exists',
            'login' => $json->login
        ]);
    }
}
