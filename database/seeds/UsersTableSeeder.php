<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Adam Carter',
            'email' => 'araquach@yahoo.co.uk',
            'username' => 'araquach',
            'password' => Hash::make('blonde123'),
            'staff_id' => 1,
            'remember_token' => null,
        ]);
        
        DB::table('users')->insert([
            'name' => 'Jimmy Sharpe',
            'email' => 'jimmy@test.com',
            'username' => 'jimmy',
            'password' => Hash::make('jim123'),
            'staff_id' => 2,
            'remember_token' => null,
        ]);
        
        DB::table('users')->insert([
            'name' => 'Isobelle Lamb',
            'email' => 'iz@test.com',
            'username' => 'izzy',
            'password' => Hash::make('izzy123'),
            'staff_id' => 3,
            'remember_token' => null,
        ]);
        
        DB::table('users')->insert([
            'name' => 'Michelle Railton',
            'email' => 'shell@test.com',
            'username' => 'shell',
            'password' => Hash::make('shell123'),
            'staff_id' => 5,
            'remember_token' => null,
        ]);
        
        DB::table('users')->insert([
            'name' => 'Kellie Reedy',
            'email' => 'kel@test.com',
            'username' => 'kel',
            'password' => Hash::make('kel123'),
            'staff_id' => 6,
            'remember_token' => null,
        ]);
        
        DB::table('users')->insert([
            'name' => 'Natalie Doxey',
            'email' => 'nat@test.com',
            'username' => 'nat',
            'password' => Hash::make('nat123'),
            'staff_id' => 4,
            'remember_token' => null,
        ]);
    }
}