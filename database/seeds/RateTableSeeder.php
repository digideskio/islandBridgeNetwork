<?php

use Illuminate\Database\Seeder;

class RateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('rate')->count() === 0) {
            DB::table('rate')->insert([
                'prefix' => '1',
                'rate' => 1.23,
            ]);

            DB::table('rate')->insert([
                'prefix' => '3531',
                'rate' => 0.07,
            ]);

            DB::table('rate')->insert([
                'prefix' => '3538',
                'rate' => 0.30,
            ]);

            DB::table('rate')->insert([
                'prefix' => '35321',
                'rate' => 0.08,
            ]);

            DB::table('rate')->insert([
                'prefix' => '35383',
                'rate' => 0.35,
            ]);

            DB::table('rate')->insert([
                'prefix' => '35345',
                'rate' => 1.23,
            ]);

            DB::table('rate')->insert([
                'prefix' => '447',
                'rate' => 0.15,
            ]);
        }

    }

}
