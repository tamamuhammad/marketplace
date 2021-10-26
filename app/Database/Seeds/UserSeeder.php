<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username'      => 'S.art',
            'email'         => 'umarsyarief67@gmail.com',
            'password'      => password_hash('123456', PASSWORD_DEFAULT),
            'name'          => 'Umar Syarief',
            'wa'          => '6285726433347',
            'created_at'    => Time::now(),
            'updated_at'    => Time::now()
        ];

        // // Simple Queries
        // $this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)", $data);

        // Using Query Builder
        $this->db->table('user')->insert($data);
    }
}
