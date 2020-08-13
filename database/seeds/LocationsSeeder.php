<?php

use App\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create(
            [
                'code' => 'JKT',
                'name' => 'Jakarta'
            ]);

        Location::create(
            [
                'code' => 'BDG',
                'name' => 'Bandung',
            ]);

        Location::create(
            [
                'code' => 'SMG',
                'name' => 'Semarang',
            ]);

        Location::create(
            [
                'code' => 'SRB',
                'name' => 'Surabaya',
            ]);

    }
}
