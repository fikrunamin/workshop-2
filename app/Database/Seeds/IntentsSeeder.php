<?php

namespace App\Database\Seeds;

use Carbon\Carbon;

class IntentsSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $tag_intents = [
            [
                "tag" => "greeting",
                "patterns" => [
                    "Hi there",
                    "Hello",
                    "What's up",
                    "Good day",
                    "Yo"
                ],
                "responses" => [
                    "Hi",
                    "Hello",
                    "Hi there, can I help you?"
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "tag" => "goodbye",
                "patterns" => [
                    "See you again",
                    "Goodbye",
                    "Bye",
                    "See you later",
                    "byebye"
                ],
                "responses" => [
                    "See you!",
                    "Have a nice day",
                    "Thank you and Goodbye!"
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "tag" => "noanswer",
                "patterns" => [
                    "sefihesfhsef",
                    "eufeblfkapdndvls",
                    "oeirwporu3844iughelskdfb",
                    "sifosldkvbgeuofsl.ndv"
                ],
                "responses" => [
                    "Sorry, I can't understand you.",
                    "Sorry, I don't understand.",
                    "Please give me more information."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "tag" => "details",
                "patterns" => [
                    "How can you help me?",
                    "What can you do?",
                    "Please Tell me more about yourself",
                    "Please your details"
                ],
                "responses" => [
                    "I am an interactive chatbot which can help you to diagnose your problems on your dental health. You can start describe your symptoms now."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "tag" => "no_other_symptoms",
                "patterns" => [
                    "No"
                ],
                "responses" => [
                    "Its a No"
                ],
                "context" => [
                    ""
                ]
            ],
        ];

        $symptom_intents = [
            [
                "index" => 1,
                "tag" => "Hard to chew",
                "patterns" => [
                    "Hard to chew",
                    "can't chew properly",
                    "hardly chew",
                    "cannot bite"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 2,
                "tag" => "Swelling or inflammation of the gums",
                "patterns" => [
                    "Swelling or inflammation of the gums",
                    "gums are swelling",
                    "swelling of gums",
                    "gum is getting big"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 3,
                "tag" => "Shaky Teeth",
                "patterns" => [
                    "Shaky teeth",
                    "teeth is shaking",
                    "teeth not stable"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 4,
                "tag" => "Swelling of the jaw",
                "patterns" => [
                    "Swelling of the jaw",
                    "jaw is getting big",
                    "enlargement of jaw"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 5,
                "tag" => "Fever",
                "patterns" => [
                    "Fever",
                    "Body temperature increase",
                    "High temperature"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 6,
                "tag" => "Swollen lymph nodes around jaw or neck",
                "patterns" => [
                    "Swollen lymph nodes around jaw or neck",
                    "lymph is getting bigger",
                    "swollen lymph",
                    "lymph enlargement"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 7,
                "tag" => "Bad Breath",
                "patterns" => [
                    "Bad breathe",
                    "breathe smells bad",
                    "breathe stinks",
                    "mouth smells smelly"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 8,
                "tag" => "Pain or tenderness around the gums",
                "patterns" => [
                    "pain or tenderness around the gums",
                    "gums become soft",
                    "gum is painful"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 9,
                "tag" => "Severe pain for several days after tooth extraction",
                "patterns" => [
                    "severe pain for several days after tooth extraction",
                    "just take of my teeth and it is painful for few days",
                    "suffer pain for few days after extraction"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 10,
                "tag" => "Bones seen in socket",
                "patterns" => [
                    "bones seen in socket",
                    "can see my bones from socket"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 11,
                "tag" => "Teeth feel painful and sensitive",
                "patterns" => [
                    "teeth feel painful sensitive",
                    "sensitive teeth",
                    "tooth is pain sensitive"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 12,
                "tag" => "Eroded tooth",
                "patterns" => [
                    "Eroded tooth",
                    "tooth spoil",
                    "teeth eroding"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 13,
                "tag" => "Headache",
                "patterns" => [
                    "Headache",
                    "Head pain"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 14,
                "tag" => "Insomnia or feeling restless",
                "patterns" => [
                    "Insomnia or feeling restless",
                    "can't sleep properly",
                    "don't enough rest"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 15,
                "tag" => "The sound of teeth crunching during sleep",
                "patterns" => [
                    "sound of teeth crunching during sleep",
                    "teeth grinding",
                    "jaw clenching",
                    "bruxism",
                    "grind the teeth when sleeping"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 16,
                "tag" => "Gums bleed easily",
                "patterns" => [
                    "Gum bleed easily",
                    "gum often bleeds"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 17,
                "tag" => "The shape of the gum is round",
                "patterns" => [
                    "shape of gum is round",
                    "round gum shape"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 18,
                "tag" => "The consistency of the gums becomes soft",
                "patterns" => [
                    "consistency of gums become soft"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 19,
                "tag" => "Gum or suppurating teeth",
                "patterns" => [
                    "gum or suppurating teeth"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 20,
                "tag" => "Tooth aches or throbbing",
                "patterns" => [
                    "tooth aches",
                    "toothache",
                    "throbbing"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 21,
                "tag" => "Redness on the corners of the mouth",
                "patterns" => [
                    "redness on corners of mouth",
                    "red around mouth"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 22,
                "tag" => "The corner of the mouth feel painful",
                "patterns" => [
                    "corner of mouth feel painful",
                    "painful in mouth"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 23,
                "tag" => "Scaly mouth corners",
                "patterns" => [
                    "scaly mouth corners"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 24,
                "tag" => "Ulcer (wound in the corner of the mouth)",
                "patterns" => [
                    "Ulcer",
                    "mouth wound"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 25,
                "tag" => "Dentin Seen",
                "patterns" => [
                    "Dentin seen"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 26,
                "tag" => "Cavity",
                "patterns" => [
                    "cavity",
                    "surface of teeth damaged",
                    "teeth holes"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 27,
                "tag" => "Infected pulp/inflammation of the pulp",
                "patterns" => [
                    "infected pulp",
                    "inflammation of pulp",
                    "inflammation between teeth"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 28,
                "tag" => "Throbbing pain without stimulation",
                "patterns" => [
                    "throbbing pain without stimulation",
                    "throbbing without stimulation",
                    "pain sometimes without stimulation",
                    "didn't touch the area but pain"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 29,
                "tag" => "White spots on teeth",
                "patterns" => [
                    "white spots on teeth",
                    "tooth white spot on it"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 30,
                "tag" => "White patches on tongue",
                "patterns" => [
                    "white patches on tongue",
                    "white tongue"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 31,
                "tag" => "white patches on the oral cavity",
                "patterns" => [
                    "white patches on the oral cavity",
                    "oral white"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 32,
                "tag" => "Plaque deposits",
                "patterns" => [
                    "plaque deposits",
                    "teeth yellow stains"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 33,
                "tag" => "There is Tartar",
                "patterns" => [
                    "tartar",
                    "coating on teeth"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 34,
                "tag" => "Tooth decay",
                "patterns" => [
                    "tooth decay",
                    "tooth corrode"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 35,
                "tag" => "Pulp is numb",
                "patterns" => [
                    "pulp no feeling",
                    "pulp numb"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 36,
                "tag" => "The pulp chamber is open",
                "patterns" => [
                    "pulp chamber open",
                    "space between teeth is big"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ],
            [
                "index" => 37,
                "tag" => "Red gum",
                "patterns" => [
                    "red gum",
                    "gum is red",
                    "gum is reddish",
                    "gum is pinkish",
                    "pinky gum"
                ],
                "responses" => [
                    "Can you please tell us more about your symptoms? If there is no other symptoms, kindly type 'NO'."
                ],
                "context" => [
                    ""
                ]
            ]
        ];

        foreach ($tag_intents as $intent) {
            $this->db->table('tags')->insert([
                'name' => $intent['tag']
            ]);

            $id_tag = $this->db->insertID();
            $this->db->table('intents')->insert([
                'id_tag' => $id_tag
            ]);
            $id_intent = $this->db->insertID();

            foreach ($intent['patterns'] as $pattern) {
                $this->db->table('patterns')->insert([
                    'name' => $pattern
                ]);

                $id_pattern = $this->db->insertID();
                $this->db->table('intent_has_patterns')->insert([
                    'id_intent' => $id_intent,
                    'id_pattern' => $id_pattern
                ]);
            }
            foreach ($intent['responses'] as $response) {
                $this->db->table('responses')->insert([
                    'name' => $response
                ]);
                $id_response = $this->db->insertID();
                $this->db->table('intent_has_responses')->insert([
                    'id_intent' => $id_intent,
                    'id_response' => $id_response
                ]);
            }
            foreach ($intent['context'] as $context) {
                if ($context != "") {
                    $this->db->table('contexts')->insert([
                        'name' => $context
                    ]);
                    $id_context = $this->db->insertID();
                    $this->db->table('intent_has_contexts')->insert([
                        'id_intent' => $id_intent,
                        'id_context' => $id_context
                    ]);
                }
            }
        }

        foreach ($symptom_intents as $index => $intent) {
            $this->db->table('intents')->insert([
                'id_symptom' => $intent['index']
            ]);
            $id_intent = $this->db->insertID();

            foreach ($intent['patterns'] as $pattern) {
                $this->db->table('patterns')->insert([
                    'name' => $pattern
                ]);

                $id_pattern = $this->db->insertID();
                $this->db->table('intent_has_patterns')->insert([
                    'id_intent' => $id_intent,
                    'id_pattern' => $id_pattern
                ]);
            }
            foreach ($intent['responses'] as $response) {
                $this->db->table('responses')->insert([
                    'name' => $response
                ]);
                $id_response = $this->db->insertID();
                $this->db->table('intent_has_responses')->insert([
                    'id_intent' => $id_intent,
                    'id_response' => $id_response
                ]);
            }
            foreach ($intent['context'] as $context) {
                if ($context != "") {
                    $this->db->table('contexts')->insert([
                        'name' => $context
                    ]);
                    $id_context = $this->db->insertID();
                    $this->db->table('intent_has_contexts')->insert([
                        'id_intent' => $id_intent,
                        'id_context' => $id_context
                    ]);
                }
            }
        }
    }
}
