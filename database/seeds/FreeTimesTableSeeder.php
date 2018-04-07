<?php

use Illuminate\Database\Seeder;

class FreeTimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('free_times')->insert([
            'staff_id' => '1',
            'free_time_hours' => '4',
            'description' => 'Early Dart',
            'date_regarding' => '2017-02-24',
            'approved' => '0',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
        
        DB::table('free_times')->insert([
            'staff_id' => '2',
            'free_time_hours' => '8',
            'description' => 'Doctors',
            'date_regarding' => '2017-02-27',
            'approved' => '0',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
        
        DB::table('free_times')->insert([
            'staff_id' => '3',
            'free_time_hours' => '2',
            'description' => 'Bored',
            'date_regarding' => '2017-02-25',
            'approved' => '0',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
        
        DB::table('free_times')->insert([
            'staff_id' => '4',
            'free_time_hours' => '1',
            'description' => 'Lie In',
            'date_regarding' => '2017-02-26',
            'approved' => '0',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
        
        DB::table('free_times')->insert([
            'staff_id' => '5',
            'free_time_hours' => '2',
            'description' => 'Finished Early',
            'date_regarding' => '2017-02-24',
            'approved' => '0',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
        
        DB::table('free_times')->insert([
            'staff_id' => '6',
            'free_time_hours' => '3',
            'description' => 'Extended Lunch',
            'date_regarding' => '2017-02-26',
            'approved' => '0',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
        
        DB::table('free_times')->insert([
            'staff_id' => '3',
            'free_time_hours' => '1',
            'description' => 'Playing Cricket',
            'date_regarding' => '2017-02-26',
            'approved' => '0',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
    }
}
