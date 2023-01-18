<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use App\Models\Department;
class DepartmentSeeder extends Seeder
{
    public function run()
    {
        $student= new \App\Models\Department();
        $data = [];
        $faker = \Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'namedepartment' => $faker->name,
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
        $this->db->table('department')->insertBatch($data);
    }
}
