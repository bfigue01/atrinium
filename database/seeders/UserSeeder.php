<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Admin',
            'email'=>'admin@mail.com',
            'rol_id'=>1,
            'password'=>'$2y$12$cCPYq.a8t1Nf/FLzuHj.3..wCmsC755WEFFDEMkN24lYwkqvKFbTW',
        ]);
    }
}
