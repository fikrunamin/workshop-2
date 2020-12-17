<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        $data = [
            'title' => 'Login'
        ];
        echo view('auth/login', $data);
    }
    public function register()
    {
        $data = [
            'title' => 'Create Account'
        ];
        echo view('auth/register', $data);
    }
    public function logout()
    {
    }

    //--------------------------------------------------------------------

}
