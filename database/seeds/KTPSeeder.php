<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class KTPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 50000; $i++){
    		DB::table('data_ktp')->insert([
                'nama'              => $faker->name,
                'tempat_lahir'      => $faker->city,
                'tanggal_lahir'     => $faker->date($format = 'Y-m-d', $max = 'now'),
                'jenis_kelamin'     => $faker->randomElement($array = array ('LAKI-LAKI','PEREMPUAN')),
                'golongan_darah'    => $faker->randomElement($array = array ('A','B','AB','O')),
                'alamat'            => $faker->address,
                'agama'             => $faker->randomElement($array = array ('ISLAM','KRISTEN','BUDHA')),
                'status_kawin'      => $faker->randomElement($array = array ('BELUM KAWIN','KAWIN','CERAI')),
                'pekerjaan'         => $faker->jobTitle,
                'kewarganegaraan'   => $faker->randomElement($array = array ('WNA','WNI'))
    		]);
    	}
    }
}
