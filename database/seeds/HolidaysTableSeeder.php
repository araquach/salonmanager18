<?php

use Illuminate\Database\Seeder;

class HolidaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('holidays')->insert([
            'staff_id' => '1',
            'hours_requested' => '16',
            'prebooked' => '0',
            'request_date_from' => '2017-02-28',
            'request_date_to' => '2017-03-01',
            'saturday' => '1',
            'approved' => '0',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
        
        DB::table('holidays')->insert([
            'staff_id' => '2',
            'hours_requested' => '8',
            'prebooked' => '1',
            'request_date_from' => '2017-04-05',
            'request_date_to' => '2017-04-05',
            'saturday' => '0',
            'approved' => '0',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
        
        DB::table('holidays')->insert([
            'staff_id' => '3',
            'hours_requested' => '24',
            'prebooked' => '0',
            'request_date_from' => '2017-03-02',
            'request_date_to' => '2017-03-04',
            'saturday' => '0',
            'approved' => '0',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
        
        DB::table('holidays')->insert([
            'staff_id' => '4',
            'hours_requested' => '32',
            'prebooked' => '1',
            'request_date_from' => '2017-05-10',
            'request_date_to' => '2017-05-13',
            'saturday' => '0.5',
            'approved' => '0',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
        
        DB::table('holidays')->insert([
            'staff_id' => '5',
            'hours_requested' => '8',
            'prebooked' => '0',
            'request_date_from' => '2017-02-28',
            'request_date_to' => '2017-02-28',
            'saturday' => '0',
            'approved' => '0',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
        
        DB::table('holidays')->insert([
            'staff_id' => '6',
            'hours_requested' => '40',
            'prebooked' => '1',
            'request_date_from' => '2017-05-22',
            'request_date_to' => '2017-05-26',
            'saturday' => '1.5',
            'approved' => '0',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
        
        DB::table('holidays')->insert([
            'staff_id' => '4',
            'hours_requested' => '8',
            'prebooked' => '0',
            'request_date_from' => '2017-03-02',
            'request_date_to' => '2017-03-02',
            'saturday' => '0',
            'approved' => '0',
            'created_at' => '2017-02-23',
            'updated_at' => '2017-02-23',
        ]);
    }
}
