<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Crear el usuario con el modelo
        $user = User::create([
            'name' => 'Hector',
            'email' => 'correo@correo.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://trecho.com',
        ]);


        //Crear el usuario con el modelo
        $user2 = User::create([
            'name' => 'Alfonso',
            'email' => 'correo2@correo.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://trecho2.com',
        ]);
    }
}
