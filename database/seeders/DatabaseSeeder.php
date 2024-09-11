<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name'=>'Jose Daniel Grijalba Osorio',
            'email'=> 'jose.jdgo97@gmail.com',
            'password'=> bcrypt('123123123'),
        ]);
        User::create([
            'name'=>'Secretaria',
            'email'=> 'secretaria@gmail.com',
            'password'=> bcrypt('123123123'),
        ]);
        User::create([
            'name'=>'Doctor',
            'email'=> 'doctor@gmail.com',
            'password'=> bcrypt('123123123'),
        ]);
        User::create([
            'name'=>'Paciente',
            'email'=> 'paciente@gmail.com',
            'password'=> bcrypt('123123123'),
        ]);
    }
}
