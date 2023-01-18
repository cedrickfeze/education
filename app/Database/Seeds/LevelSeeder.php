<?php

namespace App\Database\Seeds;

use App\Models\Level;
use CodeIgniter\Database\Seeder;

class LevelSeeder extends Seeder
{
    public function run()
    {
        $student= new \App\Models\Level();
        $data = [];
        $faker = \Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'descslevel' => $faker->text($maxNbChars = 20),
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
        $this->db->table('level')->insertBatch($data);
    }
}
