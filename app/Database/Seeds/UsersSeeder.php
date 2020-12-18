<?php

namespace App\Database\Seeds;

use Carbon\Carbon;

class UsersSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            'fullname' => 'Admin',
            'occupation' => 'Student',
            'gender' => 'Student',
            'birthdate' => '2000-01-01',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $this->db->table('users')->insert($data);

        $data = [
            'id_user' => '1',
            'email' => 'admin@email.com',
            'password' => password_hash('123', PASSWORD_DEFAULT),
            'role' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $this->db->table('authorized_users')->insert($data);
    }
}
