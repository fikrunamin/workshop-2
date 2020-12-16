<?php

namespace App\Database\Seeds;

class DiseaseHasSymptomsSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $datas = [
            ['1', '2', '3'],
            ['7', '1', '4', '8', '5', '6'],
            ['7', '9', '10'],
            ['11', '12'],
            ['11', '13', '14', '15'],
            ['2', '16', '17', '18'],
            ['2', '5', '6', '19', '20'],
            ['7', '1', '4', '8', '2'],
            ['21', '22', '23', '24'],
            ['26', '25', '11'],
            ['25', '26', '27', '28'],
            ['26', '29'],
            ['7', '30', '31'],
            ['7', '16', '32', '33'],
            ['26', '34', '35', '36'],
            ['7', '16', '2', '19', '37']
        ];

        for ($i = 0; $i < count($datas); $i++) {
            for ($j = 0; $j < count($datas[$i]); $j++) {
                $data = [
                    'id_disease' => array_keys($datas)[$i] + 1,
                    'id_symptom' => $datas[$i][$j],
                ];

                $this->db->table('disease_has_symptoms')->insert($data);
            }
        }
    }
}
