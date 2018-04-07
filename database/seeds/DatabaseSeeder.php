<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StaffsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(FreeTimesTableSeeder::class);
        $this->call(HolidaysTableSeeder::class);
        $this->call(SickDaysTableSeeder::class);
        $this->call(LieuHoursTableSeeder::class);
    }
}