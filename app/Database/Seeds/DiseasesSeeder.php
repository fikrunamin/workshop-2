<?php

namespace App\Database\Seeds;

class DiseasesSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $diseases = [
            ['Periodontal Abscess', 'Infection that is located around the periodontal pocket as well as can resulting in ligament damage periodontal and alveolar bone.'],
            ['Peripical Abscess', 'A collection of pus at the root of a tooth, usually caused by an infection that has spread from a tooth to the surrounding tissues.'],
            ['Alveolar Osteitis', 'A painful dental condition that sometimes happens after you have a permanent adult tooth extracted. Dry socket is when the blood clot at the site of the tooth extraction fails to develop, or it dislodges or dissolves before the wound has healed.'],
            ['Dental Abrasion', 'Is another form of dental damage caused by the forces applied to the teeth. Rather than being caused by tooth on tooth contact, abrasion is typically caused by outside elements, like aggressively brushing the teeth.'],
            ['Bruxism', 'The involuntary gnashing, grinding, or clenching of teeth. It is usually an unconscious activity, whether the individual is awake or asleep'],
            ['Gingivitis', 'A common and mild form of gum disease (periodontal disease) that causes irritation, redness and swelling (inflammation) of your gingiva, the part of your gum around the base of your teeth.'],
            ['Infected Teeth', 'A pocket of pus that can form in different parts of a tooth as a result of a bacterial infection. It’s sometimes called a dental abscess. An abscessed tooth causes moderate to severe pain that can sometimes radiate to your ear or neck.'],
            ['Pain at the rear teeth', 'Sinus infection can be referred to the rear teeth pain which mean can cause a toothache ,specifically in the upper rear teeth, which are close to the sinuses.'],
            ['Angular Ceilitis', 'Inflammation and fissuring radiating from the commissures (angles) of the mouth secondary to predisposing factors such as nutritional deficiencies, atopic dermatitis, or Candida albicans (yeast) infection. Also called angular stomatitis, commissural cheilitis, or perlèche.'],
            ['Caries Media', 'Extensive structural defect. Caries has penetrated up to the dentin and spreads two-dimensionally beneath the enamel defect where the dentin offers little resistance.'],
            ['Caries Profunda', 'Deep structural defect. Caries has penetrated up to the dentin layers of the tooth close to the pulp.'],
            ['Caries Superficial', 'Enamel caries, wedge-shaped structural defect. Caries has affected the enamel layer, but has not yet penetrated the dentin.'],
            ['Candidiasis', 'An infection caused by a species of the yeast Candida, usually Candida albicans.'],
            ['Calculus (dental)', 'A form of hardened dental plaque'],
            ['Pulp Necrosis', 'A clinical diagnostic category indicating the death of cells and tissues in the pulp chamber of a tooth with or without bacterial invasion.'],
            ['Periodontitis', 'Inflammation of the tissue around the teeth, often causing shrinkage of the gums and loosening of the teeth.'],
        ];

        for ($i = 0; $i < count($diseases); $i++) {
            $data = [
                'id' => $i + 1,
                'name' => $diseases[$i][0],
                'definition' => $diseases[$i][1],
            ];

            $this->db->table('diseases')->insert($data);
        }
    }
}
