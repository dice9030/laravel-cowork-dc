<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run(): void
    {   
          // Crear usuario administrador
        $admin = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('admin123'),
            ]
        );

        $role = Role::firstOrCreate(['name' => 'admin']);
        $admin->assignRole($role);

         // Crear usuario cliente
        $cliente = User::firstOrCreate(
            ['email' => 'cliente@cliente.com'],
            [
                'name' => 'Cliente Ejemplo',
                'password' => Hash::make('cliente123'),
            ]
        );

        $clienteRole = Role::firstOrCreate(['name' => 'cliente']);
        $cliente->assignRole($clienteRole);
    }
}
