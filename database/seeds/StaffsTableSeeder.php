<?php

use Illuminate\Database\Seeder;

class StaffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staffs')->insert([
            'first_name' => 'Adam',
            'second_name' => 'Carter',
            'address1' => '32 Glossop Close',
            'address2' => 'Warrington',
            'address3' => '',
            'postcode' => 'WA1 2GS',
            'email' => 'adam@jakatasalon.co.uk',
            'mobile' => '07921806884',
            'salon_id' => 1,
            'dob' => '1976-02-16',
            'working_hours_week' => 40,
            'holiday_entitlement' => 27,
            'free_time_entitlement' => 5,
            'active' => 1,
            'role' => 1
        ]);
        
        DB::table('staffs')->insert([
            'first_name' => 'Jimmy',
            'second_name' => 'Sharpe',
            'address1' => '19 Some Road',
            'address2' => 'Orford',
            'address3' => 'Warrington',
            'postcode' => 'WA1 5SR',
            'email' => 'jimmy@jakatasalon.co.uk',
            'mobile' => '07999555555',
            'salon_id' => 1,
            'dob' => '1987-01-06',
            'working_hours_week' => 40,
            'holiday_entitlement' => 27,
            'free_time_entitlement' => 5,
            'active' => 1,
            'role' => 1
        ]);
        
        DB::table('staffs')->insert([
            'first_name' => 'Isobelle',
            'second_name' => 'Lamb',
            'address1' => '32 Glossop Close',
            'address2' => 'Warrington',
            'address3' => '',
            'postcode' => 'WA1 2GS',
            'email' => 'izzy@izzy.com',
            'mobile' => '07777444444',
            'salon_id' => 2,
            'dob' => '1987-11-21',
            'working_hours_week' => 40,
            'holiday_entitlement' => 27,
            'free_time_entitlement' => 5,
            'active' => 1,
            'role' => 2
        ]);
        
        DB::table('staffs')->insert([
            'first_name' => 'Natalie',
            'second_name' => 'Doxey',
            'address1' => '19 Some Road',
            'address2' => 'Orford',
            'address3' => 'Warrington',
            'postcode' => 'WA1 5SR',
            'email' => 'nat@nat.com',
            'mobile' => '078763477736',
            'salon_id' => 1,
            'dob' => '1989-07-26',
            'working_hours_week' => 40,
            'holiday_entitlement' => 27,
            'free_time_entitlement' => 5,
            'active' => 1,
            'role' => 2
        ]);
        
        DB::table('staffs')->insert([
            'first_name' => 'Michelle',
            'second_name' => 'Railton',
            'address1' => '12 Tree Road',
            'address2' => 'Burtonwood',
            'address3' => 'Warrington',
            'postcode' => 'WA7 2EE',
            'email' => 'shell@shell.com',
            'mobile' => '07634574368',
            'salon_id' => 2,
            'dob' => '1984-04-27',
            'working_hours_week' => 16,
            'holiday_entitlement' => 11,
            'free_time_entitlement' => 3,
            'active' => 1,
            'role' => 2
        ]);
        
        DB::table('staffs')->insert([
            'first_name' => 'Kellie',
            'second_name' => 'Reedy',
            'address1' => '13 Chester Road',
            'address2' => 'Walton',
            'address3' => 'Warrington',
            'postcode' => 'WA4 4RT',
            'email' => 'kel@kel.com',
            'mobile' => '0736546356534',
            'salon_id' => 2,
            'dob' => '1982-09-13',
            'working_hours_week' => 40,
            'holiday_entitlement' => 27,
            'free_time_entitlement' => 5,
            'active' => 1,
            'role' => 1
        ]);
    }
}