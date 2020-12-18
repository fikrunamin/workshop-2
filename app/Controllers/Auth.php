<?php

namespace App\Controllers;

use App\Models\AuthorizedUser;
use App\Models\User;

class Auth extends BaseController
{
    protected $userModel;
    protected $authorizedUserModel;

    public function __construct()
    {
        $this->userModel = new User();
        $this->authorizedUserModel = new AuthorizedUser();
    }

    public function login()
    {

        if ($this->request->getMethod() == 'post') {
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            $session = session();
            $data = $this->authorizedUserModel->where('email', $email)->first();
            if ($data) {
                $pass = $data['password'];
                $verify_pass = password_verify($password, $pass);
                if ($verify_pass) {
                    $this->setUserMethod($data);
                    return redirect()->to('/dashboard');
                } else {
                    $session->setFlashdata('msg', 'Wrong mail or password!');
                    return redirect()->to('/auth/login');
                }
            } else {
                $session->setFlashdata('msg', 'Wrong mail or password!');
                return redirect()->to('/auth/login');
            }
        }

        $data = [
            'title' => 'Login'
        ];
        echo view('auth/login', $data);
    }
    public function register()
    {
        if ($this->request->getMethod() == 'post') {
            $data = [
                'fullname' => $this->request->getVar('fullname'),
                'occupation' => $this->request->getVar('occupation'),
                'gender' => $this->request->getVar('prefix') == "mr" ? "male" : "female",
                'birthdate' => $this->request->getVar('birthdate'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ];

            $this->userModel->insert($data);

            $id_user = $this->userModel->getInsertID();

            $data = [
                'id_user' => $id_user,
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'role' => 2,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ];

            $this->authorizedUserModel->insert($data);

            return redirect()->to(base_url() . '/auth/login');
        }

        $data = [
            'title' => 'Create Account'
        ];
        echo view('auth/register', $data);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/auth/login');
    }

    public function guest()
    {
    }

    private function setUserMethod($data)
    {
        $session = session();
        $data_user = $this->userModel->where('id', $data['id_user'])->first();

        $ses_data = [
            'id_user' => $data['id_user'],
            'email' => $data['email'],
            'logged_in' => TRUE,
            'data_user' => $data_user
        ];
        $session->set($ses_data);
    }

    //--------------------------------------------------------------------

}
