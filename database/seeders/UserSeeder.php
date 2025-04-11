<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // // Buscar usuarios por algún criterio (ej: email)
        // $user = User::where('email', 'ibaquedano@unah.hn')->first();
        // if ($user) {
        //     $user->password = Hash::make('ibaquedano123');
        //     $user->save();
        // }
        // dump($user->email);

        // // Buscar usuarios por algún criterio (ej: email)
        // $user = User::where('email', 'fsbetancourth@unah.hn')->first();
        // if ($user) {
        //     $user->password = Hash::make('fsbetancourth123');
        //     $user->save();
        // }
        // dump($user->email);

        // // Buscar usuarios por algún criterio (ej: email)
        // $user = User::where('email', 'dacia.espinoza@unah.hn')->first();
        // if ($user) {
        //     $user->password = Hash::make('dacia.espinoza123');
        //     $user->save();
        // }
        // dump($user->email);

        // // Buscar usuarios por algún criterio (ej: email)
        // $user = User::where('email', 'jorlin.rosa@unah.hn')->first();
        // if ($user) {
        //     $user->password = Hash::make('jorlin.rosa123');
        //     $user->save();
        // }
        // dump($user->email);

        // // Buscar usuarios por algún criterio (ej: email)
        // $user = User::where('email', 'cavila@unah.hn')->first();
        // if ($user) {
        //     $user->password = Hash::make('cavila123');
        //     $user->save();
        // }
        // dump($user->email);

        $role = Role::where('name', 'admin')->first();

        if ($role) {
            $allPermissions = Permission::all();
            $role->syncPermissions($allPermissions); // Asigna todos los permisos al rol
        }
    }
}
