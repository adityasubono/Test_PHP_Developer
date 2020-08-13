<?php

use App\Employee;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create(
            [
                'name' => 'Lily Stark',
                'location_code' => 'JKT',
                'birth_date' => '2000-12-31',
            ]);

        Employee::create(
            [
                'name' => 'Evan Roger',
                'location_code' => 'JKT',
                'birth_date' => '1990-10-01',
            ]);

        Employee::create(
            [
                'name' => 'George Alvin',
                'location_code' => 'JKT',
                'birth_date' => '1995-12-23',
            ]);

        Employee::create(
            [
                'name' => 'Logan Krolak',
                'location_code' => 'BDG',
                'birth_date' => '1998-02-27',
            ]);

        Employee::create(
            [
                'name' => 'Scarlet Snow',
                'location_code' => 'SRB',
                'birth_date' => '1996-06-05',
            ]);

        Employee::create(
            [
                'name' => 'Robert London',
                'location_code' => 'SMG',
                'birth_date' => '1978-05-06',
            ]);
    }
}
