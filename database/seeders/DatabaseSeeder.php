<?php

namespace Database\Seeders;

use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Paciente;
use App\Models\Secretaria;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
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
        ])->assignRole('secretaria');

        Secretaria::create([
            'nombres' => 'Secretaria',
            'apellidos' => 'Catrana',
            'cc' => 'secretaria@gmail.com',
            'celular' =>'3147078256',
            'fecha_nacimiento' =>'10/10/2010',
            'direccion' =>'calle 5 o este',
            'user_id' =>'3',
        ]);
        User::create([
            'name' => 'Doctor',
            'email' => 'doctor@gmail.com',
            'password' => bcrypt('123123123'),
        ])->assignRole('doctor');

        Doctor::create([
            'nombres' => 'Doctor',
            'apellidos' => 'Lewis',
            'telefono' => '4564564565',
            'licencia_medica' => '123123123',
            'especialidad' => 'PEDIATRIA',
            'user_id' =>'4',
        ]);
        User::create([
            'name' => 'Doctor1',
            'email' => 'doctor1@gmail.com',
            'password' => bcrypt('123123123'),
        ])->assignRole('doctor');

        Doctor::create([
            'nombres' => 'Doctor1',
            'apellidos' => 'Lewis',
            'telefono' => '432324324',
            'licencia_medica' => '777777',
            'especialidad' => 'ODONTOLOGIA',
            'user_id' =>'5',
        ]);
        User::create([
            'name' => 'Doctor2',
            'email' => 'doctor2@gmail.com',
            'password' => bcrypt('11111111'),
        ])->assignRole('doctor');

        Doctor::create([
            'nombres' => 'Doctor2',
            'apellidos' => 'Lewis',
            'telefono' => '123123213',
            'licencia_medica' => '222222',
            'especialidad' => 'FISIOTERAPIA',
            'user_id' =>'6',
        ]);
        User::create([
            'name' => 'Paciente',
            'email' => 'paciente@gmail.com',
            'password' => bcrypt('123123123'),
        ])->assignRole('paciente');
        Consultorio::create([
            'nombre' => 'PEDIATRIA',
            'ubicacion' => '1-1A',
            'capacidad' => '10',
            'telefono' => '316548',
            'especialidad' => 'PEDIATRIA',
            'estado' => 'A',
        ]);
        Consultorio::create([
            'nombre' => 'ODONTOLOGIA',
            'ubicacion' => '1-1A',
            'capacidad' => '10',
            'telefono' => '316548',
            'especialidad' => 'ODONTOLOGIA',
            'estado' => 'A',
        ]);
        Consultorio::create([
            'nombre' => 'pediatria',
            'ubicacion' => '1-1A',
            'capacidad' => '10',
            'telefono' => '316548',
            'especialidad' => 'pediatria',
            'estado' => 'A',
        ]);
        Consultorio::create([
            'nombre' => 'FISIOTERAPIA',
            'ubicacion' => '1-1A',
            'capacidad' => '10',
            'telefono' => '316548',
            'especialidad' => 'FISIOTERAPIA',
            'estado' => 'A',
        ]);
        // Paciente::create([
        //     'nombres' => 'Paciente',
        //     'apellidos' => 'miania',
        //     'cc' => '123166234' ,
        //     'nro_seguro' => '45665645',
        //     'fecha_nacimiento' => '02/05/2000',
        //     'genero' => 'M',
        //     'celular' => '324652344',
        //     'correo' => 'paciente@gmail.com',
        //     'direccion' => 'cre maga 15',
        //     'alergias' => 'polvo',
        //     'contacto_emergencia' => '366956215',
        //     'user_id' =>'7',
        // ]);
        
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('123123123'),
        ])->assignRole('usuario');

        
        Paciente::factory(10)->create()->each(function ($user){
            $user->assignRole('paciente');
        });


        // $this->call(PacienteSeeder::class);
    }
}
