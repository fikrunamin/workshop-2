<?php

namespace App\Models;

use CodeIgniter\Model;

class Chat extends Model
{
    protected $table = 'chats';

    protected $allowedFields = ['id_user', 'sender', 'message'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getChat()
    {
        return $this->where('id_user', session('id_user'))->findAll();
    }
}
