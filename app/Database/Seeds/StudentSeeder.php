<?php

namespace App\Database\Seeds;

use App\Models\Student;
use CodeIgniter\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $student= new \App\Models\Student();
        $data = [];
        $faker = \Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 50000; $i++) {
            $data[] = [
                'fname' => $faker->firstName,
                'lname' => $faker->lastName,
                'birth' => $faker->date($format = 'Y-m-d', $max = 'now')
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
        $this->db->table('student')->insertBatch($data);
    }
}
