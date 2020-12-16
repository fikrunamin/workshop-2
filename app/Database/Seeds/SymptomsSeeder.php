<?php

namespace App\Database\Seeds;

class SymptomsSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $symptoms = [
            'Hard to chew',
            'Swelling  or inflammation  of the gums',
            'Shaky Teeth',
            'Swelling of the jaw',
            'Fever',
            'Swollen lymph nodes around jaw or neck',
            'Bad Breath',
            'Pain or tenderness around the gums',
            'Severe pain for several days after tooth extraction',
            'Bones seen in socket',
            'Teeth feel painful and sensitive',
            'Eroded tooth',
            'Headache',
            'Insomnia or feeling restless',
            'The sound of teeth crunching during sleep',
            'Gums bleed easily',
            'The shape of the gum is round',
            'The consistency of the gums becomes soft',
            'Gum or suppurating teeth',
            'Tooth aches or throbbing',
            'Redness on the corners of the mouth',
            'The corner of the mouth feel painful',
            'Scaly mouth corners',
            'Ulcer (wound in the corner of the mouth)',
            'Dentin Seen',
            'Cavity',
            'Infected pulp/inflammation of the pulp',
            'Throbbing pain without stimulation',
            'White spots on teeth',
            'White patches on tongue',
            'White patches on the oral cavity',
            'Plaque deposits',
            'There is Tartar',
            'Tooth decay',
            'Pulp is numb',
            'The pulp chamber is open',
            'Red gum'
        ];

        for ($i = 0; $i < count($symptoms); $i++) {
            $data = [
                'id' => $i + 1,
                'name' => $symptoms[$i],
            ];

            $this->db->table('symptoms')->insert($data);
        }
    }
}
