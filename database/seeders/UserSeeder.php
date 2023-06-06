<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create('id_ID');
        DB::table('users')->insert([
            'nama'=>"Gabrielle Evan Farrel",
            'nik'=>"2051",
            'password'=>Hash::make("123"),
            'telepon'=>"081913910239",
            'kota_asal'=>$faker->city(),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'nama'=>"Miftahul Ihsan",
            'nik'=>"5020",
            'password'=>Hash::make("123"),
            'telepon'=>"085215168475",
            'kota_asal'=>$faker->city(),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'nama'=>"Al'Ravie Mutiar Mahesa",
            'nik'=>"1111",
            'password'=>Hash::make("123"),
            'telepon'=>"081310887676",
            'kota_asal'=>$faker->city(),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        for($i=0;$i<2;$i++){
            DB::table('users')->insert([
                'nama'=>$faker->name(),
                'nik'=>$faker->numberBetween(200000000000000,240000000000000),
                'password'=>Hash::make($faker->password()),
                'telepon'=>$faker->phoneNumber(),
                'kota_asal'=>$faker->city(),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ]);
        }
    }
}
