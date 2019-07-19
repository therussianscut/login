<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        User::truncate();
        DB::table('role_user')->truncate();


        $adminRole= Role::where('name', 'admin')->first();
        $authorRole= Role::where('name', 'author')->first();
        $userRole= Role::where('name', 'user')->first();


        $admin= User::create([

            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')


        ]);


        $author= User::create([

            'name' => 'user',
            'email' => 'author@author.com',
            'password' => bcrypt('password')


        ]);

        $user= User::create([

            'name' => 'Admin',
            'email' => 'user@user.com',
            'password' => bcrypt('password')


        ]);


        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);

        factory(App\User::class, 50)->create();

    }
}
