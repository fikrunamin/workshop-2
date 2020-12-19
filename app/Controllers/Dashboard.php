<?php

namespace App\Controllers;

use App\Models\Disease;
use App\Models\Chat;

class Dashboard extends BaseController
{
    protected $diseaseModel;
    protected $chatModel;
    public function __construct()
    {
        $this->diseaseModel = new Disease();
        $this->chatModel = new Chat();
    }

    public function index()
    {
        return view('dashboard');
    }

    public function main()
    {
        if ($this->request->isAJAX()) {
            $page = service('request')->getPost('page');
            session()->set('page', $page);
            $view = [
                "main" => view("pages/{$page}/main"),
                "secondary" => view("pages/{$page}/secondary"),
            ];
            echo json_encode($view);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function chatbot()
    {
        if ($this->request->isAJAX()) {
            $data = $this->chatModel->getChat();

            if (count($data) > 0) {
                $data = $this->groupArrayDate($data, 'created_at');
                echo view('pages/chatbot/chat_section', ['data' => $data]);
            } else {
                echo view('pages/chatbot/new_users');
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function start_consultation()
    {
        if ($this->request->isAJAX()) {
            $data = $this->chatModel->getChat();

            if (count($data) <= 0) {
                $data = [
                    "id_user" => session('id_user'),
                    "sender" => "bot",
                    "message" => "Welcome to Medical Chatbot, Admin. How can we help you today?"
                ];

                $this->chatModel->insert($data);

                $data = $this->chatModel->getChat();

                $data = $this->groupArrayDate($data, 'created_at');

                echo view('pages/chatbot/chat_section', ['data' => $data]);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function send_message()
    {
        if ($this->request->isAJAX()) {
            $data = $this->chatModel->getChat();
            $message = service('request')->getPost('message');
            $id_user = session('id_user');

            $data = [
                "id_user" => $id_user,
                "sender" => "me",
                "message" => $message
            ];

            $this->chatModel->insert($data);

            if (strpos($message, 'time') || $message == "time") {
                $data = [
                    'id_user' => $id_user,
                    'sender' => 'bot',
                    'message' => "It's " . \Carbon\Carbon::now()->format('H:i.') . ' ',
                ];
            } else {
                $data = [
                    'id_user' => $id_user,
                    'sender' => 'bot',
                    'message' => " Sorry, Sir. I don't understand what you mean.",
                ];
            }
            $this->chatModel->insert($data);
            echo $data['message'];
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function disease()
    {
        if ($this->request->isAJAX()) {
            $keyword = service('request')->getPost('keyword');

            $diseases = $this->diseaseModel->getDisease($keyword);
            $diseases = (object) $this->groupArray($diseases, 'id');

            echo json_encode($diseases);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    //--------------------------------------------------------------------

}
