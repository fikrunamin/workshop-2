<?php

namespace App\Models;

use CodeIgniter\Model;

class Disease extends Model
{
    protected $table = 'diseases';

    protected $allowedFields = ['name', 'definition'];

    private function groupArray($arrays, $key)
    {
        $result = array();
        foreach ($arrays as $array) {
            $result[$array[$key]][] = $array;
        }
        return $result;
    }

    public function getDisease($id = "")
    {
        if ($id == "") {
            return $this->findAll();
        }

        $query =  $this
            ->query("select diseases.*, symptoms.id as symptom_id, symptoms.name as symptom_name, treatments.id as treatment_id, treatments.name as treatment_name from diseases
            LEFT JOIN disease_has_symptoms on diseases.id = disease_has_symptoms.id_disease
            LEFT JOIN symptoms on symptoms.id = disease_has_symptoms.id_symptom
            LEFT JOIN disease_has_treatments on diseases.id = disease_has_treatments.id_disease
            LEFT JOIN treatments on treatments.id = disease_has_treatments.id_treatment
            WHERE diseases.id = '$id'");

        $data_disease = $query->getResultArray();
        $symptoms = array();
        $treatments = array();

        foreach ($data_disease as $dd) {
            $symptoms[] = [$dd['symptom_id'], $dd['symptom_name']];
            $treatments[] = [$dd['treatment_id'], $dd['treatment_name']];
        }

        $data = [
            'id' => $data_disease[0]['id'],
            'name' => $data_disease[0]['name'],
            'definition' => $data_disease[0]['definition'],
            'treatments' => array_values(array_unique($treatments, SORT_REGULAR)),
            'symptoms' => array_values(array_unique($symptoms, SORT_REGULAR)),
        ];

        return $data;
    }
}
