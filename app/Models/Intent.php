<?php

namespace App\Models;

use CodeIgniter\Model;

class Intent extends Model
{
    protected $table = 'intents';

    protected $allowedFields = ['id_symptom', 'id_tag'];

    public function getSymptomsWithoutPatterns()
    {
        return $this->query('select intents.id_symptom,symptoms.* from symptoms left join intents on symptoms.id = intents.id_symptom where id_symptom is null')->getResultArray();
    }
    public function getSymptomsWithPatterns()
    {
        return $this->query('select intents.id_symptom,symptoms.* from symptoms left join intents on symptoms.id = intents.id_symptom where id_symptom is not null')->getResultArray();
    }
    public function getSymptom($id = "")
    {
        $results = $this->query("select symptoms.*, patterns.id as pattern_id, patterns.name as pattern_name, responses.id as response_id, responses.name as response_name from intents RIGHT JOIN symptoms on symptoms.id = intents.id_symptom LEFT JOIN intent_has_patterns on intent_has_patterns.id_intent = intents.id left join patterns on patterns.id = intent_has_patterns.id_pattern LEFT JOIN intent_has_responses on intent_has_responses.id_intent = intents.id left join responses on responses.id = intent_has_responses.id_response where symptoms.id = $id")
            ->getResultArray();

        $patterns = [];
        $responses = [];

        foreach ($results as $result) {
            $patterns[] = [$result['pattern_id'], $result['pattern_name']];
            $responses[] = [$result['response_id'], $result['response_name']];
        }

        $data = [
            'id' => $results[0]['id'],
            'name' => $results[0]['name'],
            'patterns' => array_values(array_unique($patterns, SORT_REGULAR)),
            'responses' => array_values(array_unique($responses, SORT_REGULAR)),
        ];

        return $data;
    }

    public function getTagsWithoutPatterns()
    {
        return $this->query('select intents.id_tag, tags.* from tags left join intents on tags.id = intents.id_tag where id_tag is null')->getResultArray();
    }
    public function getTagsWithPatterns()
    {
        return $this->query('select intents.id_tag, tags.* from tags left join intents on tags.id = intents.id_tag where id_tag is not null')->getResultArray();
    }
    public function getTag($id = "")
    {
        $results = $this->query("select tags.*, patterns.id as pattern_id, patterns.name as pattern_name, responses.id as response_id, responses.name as response_name from intents RIGHT JOIN tags on tags.id = intents.id_tag LEFT JOIN intent_has_patterns on intent_has_patterns.id_intent = intents.id left join patterns on patterns.id = intent_has_patterns.id_pattern LEFT JOIN intent_has_responses on intent_has_responses.id_intent = intents.id left join responses on responses.id = intent_has_responses.id_response where tags.id = $id")
            ->getResultArray();

        $patterns = [];
        $responses = [];

        foreach ($results as $result) {
            $patterns[] = [$result['pattern_id'], $result['pattern_name']];
            $responses[] = [$result['response_id'], $result['response_name']];
        }

        $data = [
            'id' => $results[0]['id'],
            'name' => $results[0]['name'],
            'patterns' => array_values(array_unique($patterns, SORT_REGULAR)),
            'responses' => array_values(array_unique($responses, SORT_REGULAR)),
        ];

        return $data;
    }

    public function getAllIntents()
    {
        $intents = [];
        $total_tag_intents = $this->db->table('intents')->where("id_tag is not null")->countAllResults();
        $total_symptom_intents = $this->db->table('intents')->where("id_symptom is not null")->countAllResults();

        for ($i = 1; $i <= $total_tag_intents; $i++) {
            // General Tag
            $tag_results = $this->query("select tags.*, patterns.id as pattern_id, patterns.name as pattern_name, responses.id as response_id, responses.name as response_name from intents RIGHT JOIN tags on tags.id = intents.id_tag LEFT JOIN intent_has_patterns on intent_has_patterns.id_intent = intents.id left join patterns on patterns.id = intent_has_patterns.id_pattern LEFT JOIN intent_has_responses on intent_has_responses.id_intent = intents.id left join responses on responses.id = intent_has_responses.id_response where tags.id = $i")
                ->getResultArray();

            $patterns = [];
            $responses = [];

            foreach ($tag_results as $result) {
                $patterns[] = $result['pattern_name'];
                $responses[] = $result['response_name'];
            }

            $data = [
                'tag' => $tag_results[0]['name'],
                'patterns' => array_values(array_unique($patterns, SORT_REGULAR)),
                'responses' => array_values(array_unique($responses, SORT_REGULAR)),
            ];
            $intents[] = $data;
        }

        //Disease Tag
        for ($i = 1; $i <= $total_symptom_intents; $i++) {
            $symptom_results = $this->query("select symptoms.*, patterns.id as pattern_id, patterns.name as pattern_name, responses.id as response_id, responses.name as response_name from intents RIGHT JOIN symptoms on symptoms.id = intents.id_symptom LEFT JOIN intent_has_patterns on intent_has_patterns.id_intent = intents.id left join patterns on patterns.id = intent_has_patterns.id_pattern LEFT JOIN intent_has_responses on intent_has_responses.id_intent = intents.id left join responses on responses.id = intent_has_responses.id_response where symptoms.id = $i")
                ->getResultArray();

            $patterns = [];
            $responses = [];

            foreach ($symptom_results as $result) {
                $patterns[] = $result['pattern_name'];
                $responses[] = $result['response_name'];
            }

            $data = [
                'tag' => $symptom_results[0]['name'],
                'patterns' => array_values(array_unique($patterns, SORT_REGULAR)),
                'responses' => array_values(array_unique($responses, SORT_REGULAR)),
            ];
            $intents[] = $data;
        }

        $final_data = ['intents' => $intents];
        return $final_data;
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
