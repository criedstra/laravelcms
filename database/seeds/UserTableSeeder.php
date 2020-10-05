<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

/**
 * Class UserTableSeeder
 */
class UserTableSeeder extends Seeder
{

    /**
     *
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Samuel Jackson';
        $user->email = 'samueljackson@jackson.com';
        $user->password = Hash::make('Samuel1234');
        $user->save();
        $user->roles()->attach(Role::where('name', 'user')->first());

        $admin = new User;
        $admin->name = 'Carel Evers';
        $admin->email = 'carelevers@live.nl';
        $admin->password =  Hash::make('admin');
        $admin->save();
        $admin->roles()->attach(Role::where('name', 'admin')->first());
    }
}
