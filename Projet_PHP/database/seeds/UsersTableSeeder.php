<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #### ADMINISTRATEUR ####
        $role_admin = Role::where('name', 'Administrator')->first();

        factory(App\User::class, 20)->create()->each(function ($user) use ($role_admin) {
            $user->assignRole($role_admin);
        });

        #### MODERATEUR ####
        $role_modo = Role::where('name', 'Moderator')->first();

        factory(App\User::class, 60)->create()->each(function ($user) use ($role_modo) {
            $user->assignRole($role_modo);
        });

        #### UTILISATEURS ####
        $role_user = Role::where('name', 'User')->first();

        factory(App\User::class, 120)->create()->each(function ($user) use ($role_user) {
            $user->assignRole($role_user);
        });
    }
}
