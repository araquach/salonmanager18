<?php

use Illuminate\Database\Seeder;

class SickDaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sick_days')->insert([
            'staff_id' => '3',
            'sick_hours' => '4',
            'description' => 'Puked',
            'sick_from' => '2017-02-24',
            'sick_to' => '2017-02-24',
            'deducted' => '1',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
        
        DB::table('sick_days')->insert([
            'staff_id' => '4',
            'sick_hours' => '8',
            'description' => 'Had the shits',
            'sick_from' => '2017-02-22',
            'sick_to' => '2017-02-22',
            'deducted' => '0',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
        
        DB::table('sick_days')->insert([
            'staff_id' => '5',
            'sick_hours' => '16',
            'description' => 'Bad cold',
            'sick_from' => '2017-02-22',
            'sick_to' => '2017-02-23',
            'deducted' => '0',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
        
        DB::table('sick_days')->insert([
            'staff_id' => '6',
            'sick_hours' => '2',
            'description' => 'Went home early poorly',
            'sick_from' => '2017-02-23',
            'sick_to' => '2017-02-23',
            'deducted' => '1',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
        
        DB::table('sick_days')->insert([
            'staff_id' => '4',
            'sick_hours' => '32',
            'description' => 'Aids',
            'sick_from' => '2017-02-20',
            'sick_to' => '2017-02-23',
            'deducted' => '1',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
        
        DB::table('sick_days')->insert([
            'staff_id' => '5',
            'sick_hours' => '4',
            'description' => 'Fainted on the shop floor',
            'sick_from' => '2017-02-24',
            'sick_to' => '2017-02-24',
            'deducted' => '0',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
        
        DB::table('sick_days')->insert([
            'staff_id' => '6',
            'sick_hours' => '16',
            'description' => 'Pink eye',
            'sick_from' => '2017-02-25',
            'sick_to' => '2017-02-26',
            'deducted' => '0',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
    }
}
