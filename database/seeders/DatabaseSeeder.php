<?php

namespace Database\Seeders;

use App\Models\Paciente;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => bcrypt('123123123'),
        ])->assignRole('admin');

        User::create([
            'name' => 'Jose Daniel Grijalba Osorio',
            'email' => 'jose.jdgo97@gmail.com',
            'password' => bcrypt('123123123'),
        ])->assignRole('admin');

        User::create([
            'name' => 'Secretaria',
            'email' => 'secretaria@gmail.com',
            'password' => bcrypt('123123123'),
        ])->assignRole('secretarias');
        User::create([
            'name' => 'Doctor',
            'email' => 'doctor@gmail.com',
            'password' => bcrypt('123123123'),
        ])->assignRole('doctores');
        User::create([
            'name' => 'Paciente',
            'email' => 'paciente@gmail.com',
            'password' => bcrypt('123123123'),
        ])->assignRole('pacientes');
        
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('123123123'),
        ])->assignRole('usuarios');
        
        Paciente::factory(10)->create()->each(function ($user){
            $user->assignRole('pacientes');
        });


        // $this->call(PacienteSeeder::class);
    }
}
