<?php

namespace App\Database\Seeds;

class CentralSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $this->call('DiseasesSeeder');
        $this->call('SymptomsSeeder');
        $this->call('TreatmentsSeeder');
        $this->call('DiseaseHasSymptomsSeeder');
        $this->call('DiseaseHasTreatmentsSeeder');
        $this->call('UsersSeeder');
    }
}
