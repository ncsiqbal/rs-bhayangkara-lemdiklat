<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@rsbhayangkara.test',
            'password' => password_hash(
                'Admin123!',
                PASSWORD_DEFAULT
            ),
            'role' => 'admin',
        ]);
    }
}