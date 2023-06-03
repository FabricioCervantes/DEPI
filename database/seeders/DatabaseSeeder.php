<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RolSeeder::class);

        DB::table('usuario')->insert([
            'idUsuario' => 100,
            'nombre' =>  'Fabricio',
            'apellidos' => 'Cervantes',
            'sexo' => 'Hombre',
            'fechaNac' => '2001-06-29',
            'ncontrol' => '19121009',
            'correo' => 'admin@gmail.com',
            'telefono' => '4433613709',
            'idIns' => 1,
            'area' => 'Sistemas',
            'contrasena' => '12345',
            'estado' => 'Activo',
            'tipou' => 'L'
        ]);

        User::create([
            'nombre' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
        ])->assignRole('Admin');
    }
}
