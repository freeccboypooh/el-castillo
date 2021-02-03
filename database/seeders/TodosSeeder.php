<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Crearemos un Administrador.
        $userAdmin = User::create([
            'name' => 'admin Paula',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('admin'),
            'tipo' => '1',
            'codigo' => 'adm1',
        ]);

        $userAdmin = User::create([
            'name' => 'super admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'tipo' => '2',
            'codigo' => 'adm2',
        ]);

        $userAdmin = User::create([
            'name' => 'el moderador',
            'email' => 'moderador@gmail.com',
            'password' => Hash::make('admin'),
            'tipo' => '3',
            'codigo' => 'adm3',
        ]);

        $userAdmin = User::create([
            'name' => 'usuario Marcos',
            'email' => 'marcos@gmail.com',
            'password' => Hash::make('marcos'),
            'tipo' => '4',
            'codigo' => 'casa4',
        ]);
    }
}
