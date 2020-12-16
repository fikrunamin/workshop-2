<?php

namespace App\Database\Seeds;

class DiseaseHasTreatmentsSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        for ($i = 0; $i < 16; $i++) {
            $data = [
                'id_disease' => $i + 1,
                'id_treatment' => $i + 1,
            ];

            $this->db->table('disease_has_treatments')->insert($data);
        }
    }
}
