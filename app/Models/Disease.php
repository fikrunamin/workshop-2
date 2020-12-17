<?php

namespace App\Models;

use CodeIgniter\Model;

class Disease extends Model
{
    protected $table = 'diseases';

    protected $allowedFields = ['name', 'definition'];

    public function getDisease($keyword = "")
    {
        if ($keyword == "") {
            return $this->findAll();
        }


        $query =  $this
            ->query("select diseases.*, symptoms.name as symptom_name, treatments.name as treatment_name from diseases
            LEFT JOIN disease_has_symptoms on diseases.id = disease_has_symptoms.id_disease
            LEFT JOIN symptoms on symptoms.id = disease_has_symptoms.id_symptom
            LEFT JOIN disease_has_treatments on diseases.id = disease_has_treatments.id_disease
            LEFT JOIN treatments on treatments.id = disease_has_treatments.id_treatment
            WHERE diseases.name LIKE '%$keyword%'");

        return $query->getResultArray();
    }
}
