<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthorizedUser extends Model
{
    protected $table = 'authorized_users';

    protected $allowedFields = ['id', 'id_user', 'email', 'password', 'role', 'created_at', 'updated_at'];
}
