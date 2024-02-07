<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;
class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        State::create([
            'sname'=>'Jammu',
            'scode'=>'103'
        ]);
        State::create([
            'sname'=>'UttarPradesh',
            'scode'=>'104'
        ]);

    }
}
