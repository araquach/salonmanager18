<?php

use Illuminate\Database\Seeder;

class LieuHoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lieu_hours')->insert([
            'staff_id' => '2',
            'add_redeem' => '1',
            'lieu_hours' => '2',
            'description' => 'Meeting',
            'date_regarding' => '2017-02-25',
            'approved' => '0',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
        
        DB::table('lieu_hours')->insert([
            'staff_id' => '3',
            'add_redeem' => '2',
            'lieu_hours' => '-2',
            'description' => 'Home Time',
            'date_regarding' => '2017-03-03',
            'approved' => '0',
            'created_at' => '2017-02-24',
            'updated_at' => '2017-02-24',
        ]);
        
        DB::table('lieu_hours')->insert([
            'staff_id' => '4',
            'add_redeem' => '1',
            'lieu_hours' => '1',
            'description' => 'Stayed back late',
            'date_regarding' => '2017-02-27',
            'approved' => '0',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
        
        DB::table('lieu_hours')->insert([
            'staff_id' => '5',
            'add_redeem' => '2',
            'lieu_hours' => '-2',
            'description' => 'Tired',
            'date_regarding' => '2017-02-25',
            'approved' => '0',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
        
        DB::table('lieu_hours')->insert([
            'staff_id' => '6',
            'add_redeem' => '2',
            'lieu_hours' => '-3',
            'description' => 'Doctors',
            'date_regarding' => '2017-03-23',
            'approved' => '0',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
        
        DB::table('lieu_hours')->insert([
            'staff_id' => '5',
            'add_redeem' => '1',
            'lieu_hours' => '2',
            'description' => 'Came in early',
            'date_regarding' => '2017-02-27',
            'approved' => '0',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
    }
}
