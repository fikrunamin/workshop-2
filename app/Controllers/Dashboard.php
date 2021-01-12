<?php

namespace App\Controllers;

use App\Models\Disease;
use App\Models\Chat;
use App\Models\Intent;
use App\Models\Report;
use Carbon\Carbon;
use CodeIgniter\I18n\Time;
use Ramsey\Uuid\Uuid;


class Dashboard extends BaseController
{
    protected $diseaseModel;
    protected $chatModel;
    protected $intentModel;
    protected $reportModel;
    protected $db;

    public function __construct()
    {
        $this->diseaseModel = new Disease();
        $this->chatModel = new Chat();
        $this->intentModel = new Intent();
        $this->reportModel = new Report();
        $this->db = \Config\Database::connect();
    }

    // Remove on production
    public function test()
    {
        // $report_data = $this->reportModel->getReport();
        // foreach ($report_data[0] as $data) {
        //     echo ($data['symptom_name']);
        // }

        // $chat_session = $this->db->table('chat_sessions')->where('id_user', session('id_user'))->orderBy('started_at', 'DESC')->limit(1)->get()->getResultArray();
        // if(count($chat_session) > 0){
        //     if(Carbon::parse($chat_session[0]['started_at'])->diffInSeconds(Time::now()) > 300){
        //         echo "lebih 5 menit";
        //     }
        //     else{
        //         echo "kurang 5 menit";
        //     }
        // }
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
            $data = [];

            if (session()->get('page') == 'disease' || session()->get('page') == 'search') {
                $data = [
                    'diseases' => $this->diseaseModel->getDisease(),
                    'symptoms' => $this->db->table('symptoms')->select('*')->get()->getResultArray(),
                    'treatments' => $this->db->table('treatments')->select('*')->get()->getResultArray()
                ];
            } else if (session()->get('page') == 'symptom') {
                $data = [
                    'symptoms_no_patterns' => $this->intentModel->getSymptomsWithoutPatterns(),
                    'symptoms' => $this->intentModel->getSymptomsWithPatterns(),
                ];
            } else if (session()->get('page') == 'tag') {
                $data = [
                    'tags_no_patterns' => $this->intentModel->getTagsWithoutPatterns(),
                    'tags' => $this->intentModel->getTagsWithPatterns(),
                ];
            } else if (session()->get('page') == 'report') {
                $data = [
                    'report_data' => $this->reportModel->getReport(),
                ];
            }

            $view = [
                "main" => view("pages/{$page}/main", $data),
                "secondary" => view("pages/{$page}/secondary", $data),
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
                $new_session = Uuid::uuid1()->toString();
                session()->set('chat_session', $new_session);

                $this->db->table('chat_sessions')->insert([
                    'session' => $new_session,
                    'id_user' => session()->get('id_user'),
                    'started_at' => Time::now()
                ]);

                $data = [
                    'session' => $new_session,
                    "sender" => "bot",
                    "message" => "Welcome to Medical Chatbot, Admin. How can we help you today?"
                ];

                $this->chatModel->insert($data);
                $id_chat = $this->chatModel->getInsertID();

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
            // $data = $this->chatModel->getChat(); // Untuk apa?

            $message = service('request')->getPost('message');

            $chat_session = $this->db->table('chat_sessions')->where('id_user', session('id_user'))->orderBy('started_at', 'DESC')->limit(1)->get()->getResultArray();

            if (count($chat_session) > 0) {
                if (Carbon::parse($chat_session[0]['started_at'])->diffInSeconds(Time::now()) > 300) {
                    $chat_session = Uuid::uuid1()->toString();
                    session()->set('chat_session', $chat_session);
                    $this->db->table('chat_sessions')->insert([
                        'session' => $chat_session,
                        'id_user' => session()->get('id_user'),
                        'started_at' => Time::now()
                    ]);
                } else {
                    $chat_session = session()->has('chat_session') ? session()->get('chat_session') : $chat_session[0]['session'];
                }
            }

            $data = [
                "session" => $chat_session,
                "sender" => "me",
                "message" => $message,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ];

            $this->db->table('chats')->insert($data);

            $client = \Config\Services::curlrequest();

            $apiRequest = $client->request(
                'POST',
                'http://localhost:5000/get_response',
                [
                    'form_params' => [
                        'message' => $message,
                        'session' => $chat_session,
                    ]
                ]
            );
            $data_response = [
                'response' => $apiRequest->getBody(),
                'status' => $apiRequest->getStatusCode(),
                'reason' => $apiRequest->getReason(),
            ];

            $data = [
                "session" => $chat_session,
                'sender' => 'bot',
                'message' => $data_response['response'],
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ];

            $this->db->table('chats')->insert($data);

            echo $data['message'];
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function disease()
    {
        if ($this->request->isAJAX()) {
            $id = service('request')->getPost('id');

            $diseases = $this->diseaseModel->getDisease($id);

            echo json_encode($diseases);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function create_disease()
    {
        if ($this->request->isAJAX()) {
            $disease_id = service('request')->getPost('disease_id');
            $disease_name = service('request')->getPost('disease_name');
            $disease_definition = service('request')->getPost('disease_definition');
            $symptoms_data = service('request')->getPost('symptoms_data');
            $treatments_data = service('request')->getPost('treatments_data');

            if ($disease_id == "") {
                $data = [
                    'name' => $disease_name,
                    'definition' => $disease_definition
                ];

                $this->diseaseModel->insert($data);
                $id_disease = $this->diseaseModel->getInsertID();

                foreach ($symptoms_data as $symptom) {
                    $this->db->table('disease_has_symptoms')->insert([
                        'id_disease' => $id_disease,
                        'id_symptom' => $symptom
                    ]);
                }

                foreach ($treatments_data as $treatment) {
                    $this->db->table('disease_has_treatments')->insert([
                        'id_disease' => $id_disease,
                        'id_treatment' => $treatment
                    ]);
                }

                echo json_encode($id_disease);
            } else {
                $data = [
                    'name' => $disease_name,
                    'definition' => $disease_definition
                ];

                $this->diseaseModel->update($disease_id, $data);

                $this->db->table('disease_has_symptoms')->where('id_disease', $disease_id)->delete();
                foreach ($symptoms_data as $symptom) {
                    $this->db->table('disease_has_symptoms')->insert([
                        'id_disease' => $disease_id,
                        'id_symptom' => $symptom
                    ]);
                }

                $this->db->table('disease_has_treatments')->where('id_disease', $disease_id)->delete();
                foreach ($treatments_data as $treatment) {
                    $this->db->table('disease_has_treatments')->insert([
                        'id_disease' => $disease_id,
                        'id_treatment' => $treatment
                    ]);
                }

                echo json_encode('Saved.');
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function delete_disease()
    {
        if ($this->request->isAJAX()) {
            $disease_id = service('request')->getPost('id');

            $this->diseaseModel->delete($disease_id);
            echo json_encode('deleted.');
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function create_symptom()
    {
        if ($this->request->isAJAX()) {
            $keyword = service('request')->getPost('keyword');
            $keyword = ucwords($keyword);

            $this->db->table('symptoms')->insert([
                'name' => $keyword
            ]);

            echo json_encode($this->db->insertID());
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function create_treatment()
    {
        if ($this->request->isAJAX()) {
            $keyword = service('request')->getPost('keyword');
            $keyword = ucwords($keyword);

            $this->db->table('treatments')->insert([
                'name' => $keyword
            ]);

            echo json_encode($this->db->insertID());
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function create_symptom_with_patterns()
    {
        if ($this->request->isAJAX()) {
            $symptom_id = service('request')->getPost('symptom_id');
            $name = service('request')->getPost('symptom_name');
            $name = ucwords($name);

            $patterns = service('request')->getPost('symptom_patterns');
            $responses = service('request')->getPost('symptom_responses');
            if ($symptom_id == "") {

                $this->db->table('symptoms')->insert([
                    'name' => $name
                ]);
                $id_symptom = $this->db->insertID();

                $this->db->table('intents')->insert([
                    'id_symptom' => $id_symptom
                ]);
                $id_intent = $this->db->insertID();

                foreach ($patterns as $pattern) {
                    $this->db->table('patterns')->insert([
                        'name' => $pattern
                    ]);
                    $id = $this->db->insertID();

                    $this->db->table('intent_has_patterns')->insert([
                        'id_intent' => $id_intent,
                        'id_pattern' => $id
                    ]);
                }

                foreach ($responses as $response) {
                    $this->db->table('responses')->insert([
                        'name' => $response
                    ]);
                    $id = $this->db->insertID();

                    $this->db->table('intent_has_responses')->insert([
                        'id_intent' => $id_intent,
                        'id_response' => $id
                    ]);
                }

                echo json_encode($id_symptom);
            } else {
                $this->db->table('symptoms')->where('id', $symptom_id)->update([
                    'name' => $name
                ]);

                $intent = $this->db->table('intents')->where('id_symptom', $symptom_id)->get()->getResultArray();
                if (count($intent) > 0) {
                    $id_intent = $intent[0]['id'];
                } else {
                    $this->db->table('intents')->insert([
                        'id_symptom' => $symptom_id
                    ]);
                    $id_intent = $this->db->insertID();
                }

                $patterns_from_db = $this->db->table('intent_has_patterns')->where('id_intent', $id_intent)->get()->getResultArray();
                if (count($patterns_from_db) > 0) {
                    foreach ($patterns_from_db as $pattern) {
                        $this->db->table('patterns')->where('id', $pattern['id_pattern'])->delete();
                    }
                }

                foreach ($patterns as $pattern) {
                    $this->db->table('patterns')->insert([
                        'name' => $pattern
                    ]);
                    $id = $this->db->insertID();

                    $this->db->table('intent_has_patterns')->insert([
                        'id_intent' => $id_intent,
                        'id_pattern' => $id
                    ]);
                }

                $responses_from_db = $this->db->table('intent_has_responses')->where('id_intent', $id_intent)->get()->getResultArray();
                if (count($responses_from_db) > 0) {
                    foreach ($responses_from_db as $response) {
                        $this->db->table('responses')->where('id', $response['id_response'])->delete();
                    }
                }

                foreach ($responses as $response) {
                    $this->db->table('responses')->insert([
                        'name' => $response
                    ]);
                    $id = $this->db->insertID();

                    $this->db->table('intent_has_responses')->insert([
                        'id_intent' => $id_intent,
                        'id_response' => $id
                    ]);
                }

                echo json_encode('');
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function edit_symptom()
    {
        if ($this->request->isAJAX()) {
            $id = service('request')->getPost('id');
            $data = $this->intentModel->getSymptom($id);

            echo json_encode($data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function create_tag_with_patterns()
    {
        if ($this->request->isAJAX()) {
            $tag_id = service('request')->getPost('tag_id');
            $name = service('request')->getPost('tag_name');
            $name = ucwords($name);

            $patterns = service('request')->getPost('tag_patterns');
            $responses = service('request')->getPost('tag_responses');
            if ($tag_id == "") {

                $this->db->table('tags')->insert([
                    'name' => $name
                ]);
                $id_tag = $this->db->insertID();

                $this->db->table('intents')->insert([
                    'id_tag' => $id_tag
                ]);
                $id_intent = $this->db->insertID();

                foreach ($patterns as $pattern) {
                    if ($pattern != "") {
                        $this->db->table('patterns')->insert([
                            'name' => $pattern
                        ]);
                        $id = $this->db->insertID();

                        $this->db->table('intent_has_patterns')->insert([
                            'id_intent' => $id_intent,
                            'id_pattern' => $id
                        ]);
                    }
                }

                foreach ($responses as $response) {
                    if ($response != "") {
                        $this->db->table('responses')->insert([
                            'name' => $response
                        ]);
                        $id = $this->db->insertID();

                        $this->db->table('intent_has_responses')->insert([
                            'id_intent' => $id_intent,
                            'id_response' => $id
                        ]);
                    }
                }

                echo json_encode($id_tag);
            } else {
                $this->db->table('tags')->where('id', $tag_id)->update([
                    'name' => $name
                ]);

                $intent = $this->db->table('intents')->where('id_tag', $tag_id)->get()->getResultArray();
                if (count($intent) > 0) {
                    $id_intent = $intent[0]['id'];
                } else {
                    $this->db->table('intents')->insert([
                        'id_tag' => $tag_id
                    ]);
                    $id_intent = $this->db->insertID();
                }

                $patterns_from_db = $this->db->table('intent_has_patterns')->where('id_intent', $id_intent)->get()->getResultArray();
                if (count($patterns_from_db) > 0) {
                    foreach ($patterns_from_db as $pattern) {
                        $this->db->table('patterns')->where('id', $pattern['id_pattern'])->delete();
                    }
                }

                foreach ($patterns as $pattern) {
                    if ($pattern != "") {
                        $this->db->table('patterns')->insert([
                            'name' => $pattern
                        ]);
                        $id = $this->db->insertID();

                        $this->db->table('intent_has_patterns')->insert([
                            'id_intent' => $id_intent,
                            'id_pattern' => $id
                        ]);
                    }
                }

                $responses_from_db = $this->db->table('intent_has_responses')->where('id_intent', $id_intent)->get()->getResultArray();
                if (count($responses_from_db) > 0) {
                    foreach ($responses_from_db as $response) {
                        $this->db->table('responses')->where('id', $response['id_response'])->delete();
                    }
                }

                foreach ($responses as $response) {
                    if ($response != "") {
                        $this->db->table('responses')->insert([
                            'name' => $response
                        ]);
                        $id = $this->db->insertID();

                        $this->db->table('intent_has_responses')->insert([
                            'id_intent' => $id_intent,
                            'id_response' => $id
                        ]);
                    }
                }

                echo json_encode('');
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function edit_tag()
    {
        if ($this->request->isAJAX()) {
            $id = service('request')->getPost('id');
            $data = $this->intentModel->getTag($id);

            echo json_encode($data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function train_data()
    {

        if ($this->request->isAJAX()) {
            $data = $this->intentModel->getAllIntents();

            $client = \Config\Services::curlrequest();

            $response = $client->request('POST', 'http://localhost:5000/train', [
                'content-type' => 'application/json',
                'json' => [
                    'data' => $data
                ]
            ]);
            $data = [
                'response' => $response->getBody(),
                'status' => $response->getStatusCode(),
                'reason' => $response->getReason(),
            ];
            echo json_encode($data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function get_response()
    {

        if ($this->request->isAJAX()) {
            $message = service('request')->getPost('message');

            $client = \Config\Services::curlrequest();

            $apiRequest = $client->request(
                'POST',
                'http://localhost:5000/get_response',
                [
                    'form_params' => [
                        'message' => $message,
                        'session' => session()->get('session'),
                    ]
                ]
            );
            $data = [
                'response' => $apiRequest->getBody(),
                'status' => $apiRequest->getStatusCode(),
                'reason' => $apiRequest->getReason(),
            ];
            echo json_encode($data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function get_report()
    {
        if ($this->request->isAJAX()) {
            $id = service('request')->getPost('id');

            $data = $this->reportModel->getReport($id);
            echo (json_encode($data));
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    //--------------------------------------------------------------------

}
