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
        return redirect()->to('/');
    }

    public function guest()
    {
        if ($this->request->getMethod() == 'post') {
            $name = 'Anonymous' . rand(1000, 9999);
            $gender = ['male', 'female'];
            $data = [
                'fullname' => $name,
                'occupation' => 'unemployed',
                'gender' => $gender[rand(0, 1)],
                'birthdate' => '01/01/2000',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ];

            $this->userModel->insert($data);

            $id_user = $this->userModel->getInsertID();

            $data = [
                'id_user' => $id_user,
                'email' => $name . '@email.com',
                'password' => password_hash('12345678', PASSWORD_DEFAULT),
                'role' => 2,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ];

            $this->authorizedUserModel->insert($data);

            $data = $this->authorizedUserModel->where('email', $data['email'])->first();
            $this->setUserMethod($data);
            return redirect()->to('/dashboard');
        }

        $data = [
            'title' => 'Guest'
        ];
        echo view('auth/guest', $data);
    }


    public function update_profile()
    {
        if ($this->request->isAJAX()) {
            if (service('request')->getPost('key') == 'profile_information') {
                $data = [
                    'fullname' => service('request')->getPost('fullname'),
                    'occupation' => service('request')->getPost('occupation'),
                    'gender' => service('request')->getPost('prefix') == "mr" ? "male" : "female",
                    'birthdate' => service('request')->getPost('birthdate'),
                    'updated_at' => \Carbon\Carbon::now(),
                ];

                $this->userModel->update(session('id_user'), $data);
            } elseif (service('request')->getPost('key') == "update_email_and_password") {
                $data = [
                    'email' => service('request')->getPost('email'),
                    'updated_at' => \Carbon\Carbon::now(),
                ];

                if (service('request')->getPost('password') != '')
                    $data['password'] = password_hash(service('request')->getPost('password'), PASSWORD_DEFAULT);

                $this->authorizedUserModel->update(session('id_user'), $data);
            }

            $data = $this->authorizedUserModel->where('email', service('request')->getPost('email') ?? session('email'))->first();
            $this->setUserMethod($data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    private function setUserMethod($data)
    {
        $session = session();
        $data_user = $this->userModel->where('id', $data['id_user'])->first();

        $ses_data = [
            'id_user' => $data['id_user'],
            'email' => $data['email'],
            'role' => $data['role'],
            'logged_in' => TRUE,
            'data_user' => $data_user,
            'page' => 'search'
        ];
        $session->set($ses_data);
    }

    //--------------------------------------------------------------------

}
