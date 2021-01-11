<?php

namespace App\Models;

use CodeIgniter\Model;

class Report extends Model
{
    protected $table = 'reports';

    protected $allowedFields = ['id_user', 'session', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getReport($id = "")
    {
        if ($id != "") {
            $results = $this
                ->query("SELECT diseases.id, diseases.name as disease_name, diseases.definition as disease_definition, treatments.name as treatment_name FROM reports LEFT JOIN report_has_diseases on report_has_diseases.id_report = reports.id LEFT JOIN detected_diseases on report_has_diseases.id_detected_disease = detected_diseases.id LEFT JOIN diseases on detected_diseases.id_disease = diseases.id LEFT JOIN disease_has_treatments on disease_has_treatments.id_disease = detected_diseases.id_disease LEFT JOIN treatments ON treatments.id = disease_has_treatments.id_treatment where reports.id = $id")
                ->getResultArray();

            $detected_diseases = [];

            $treatments = [];
            foreach ($results as $result) {
                $treatments["{$result['id']}"][] = $result['treatment_name'];
            }

            foreach ($results as $result) {
                $detected_diseases["{$result['id']}"] = [
                    'disease' => $result['disease_name'],
                    'definition' => $result['disease_definition'],
                    'treatments' => $treatments["{$result['id']}"],
                ];
            }
            $detected_diseases = array_values($detected_diseases);

            $results = $this
                ->query("SELECT symptoms.id, symptoms.name as symptom_name FROM reports LEFT JOIN report_has_symptoms on report_has_symptoms.id_report = reports.id LEFT JOIN detected_symptoms on report_has_symptoms.id_detected_symptom = detected_symptoms.id LEFT JOIN symptoms on detected_symptoms.id_symptom = symptoms.id where reports.id = $id")
                ->getResultArray();

            $detected_symptoms = $results;

            return [
                $detected_symptoms,
                $detected_diseases,
            ];
        }

        $id_user = session()->get('id_user');
        return $this->query("select * from reports where id_user = $id_user")->getResultArray();
    }
}
