<?php

use Illuminate\Database\Seeder;
use App\Siswa;

class SiswaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('id_ID');

        for ($i = 0; $i < 200; $i++) {
            Siswa::insert([
                'nis' => $faker->numberBetween($min = 100000, $max = 999999),
                'nama' => $faker->name,
                'jenis_kelamin_id' => $faker->numberBetween($min = 1, $max = 2),
                'alamat' => $faker->city ,
                'created_at' => $faker->date($format = 'Y-m-d', $max = 'now')            
            ]);
        }
    }
}
