<?php

namespace App\Models;

use CodeIgniter\Model;

class Chat extends Model
{
    protected $table = 'chats';

    protected $allowedFields = ['session', 'sender', 'message'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getChat()
    {
        return $this
        ->join('chat_sessions', 'chat_sessions.session = chats.session', 'left')
        ->where('chat_sessions.id_user', session('id_user'))
        ->findAll();
    }
}
