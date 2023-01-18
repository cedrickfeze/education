<?php

namespace App\Database\Seeds;

use App\Models\Specialty;
use CodeIgniter\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    public function run()
    {
        $student= new \App\Models\Specialty();
        $data = [];
        $faker = \Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'name' => $faker->name,
                'descspecialty' => $faker->text($maxNbChars = 20),
                'iddepartment' => $faker->numberBetween(1,10)
            ];
          /*  $a=
                [   'idClient' => null,
                    'nomClient' => $faker->name,
                    'telClient' => $faker->phoneNumber,
                    'villeClient' => $faker->city,
                    'etatClient' => $faker->RandomElement(['active', 'pending', 'inactive'])
                ];
            array_push($data, $a);*/

        }
        // Using Query Builder
        $this->db->table('specialty')->insertBatch($data);
    }
}
