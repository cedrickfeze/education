<?php

namespace App\Database\Seeds;

use App\Models\Enrollement;
use CodeIgniter\Database\Seeder;

class EnrollementSeeder extends Seeder
{
    public function run()
    {
        $student= new \App\Models\Enrollement();
        $data = [];
        $faker = \Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 50000; $i++) {
            $data[] = [
                'yearenrollement' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'idspecialty' => $faker->numberBetween(1,20),
                'idlevel' => $faker->numberBetween(1,20),
                'idstudent' => $faker->numberBetween(1,50000)
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
        $this->db->table('enrollement')->insertBatch($data);
    }
}
