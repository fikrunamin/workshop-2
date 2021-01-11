<div id="secondary_disease">
    <?= view('components/secondary_title.php', ['heading' => 'Disease Detail']); ?>

    <div id="disease_form" class="space-y-5 px-5">
        <div>
            <h3 class="font-bold">DISEASE NAME</h3>
            <div class="">
                <input type="text" class="rounded-full w-full h-10 px-5 bg-blue-100" name="disease_name">
            </div>
        </div>
        <div>
            <h3 class="font-bold">DEFINITION</h3>
            <div class="">
                <input type="text" class="rounded-full w-full h-10 px-5 bg-blue-100" name="disease_definition">
            </div>
        </div>
        <div>
            <h3 class="font-bold">SYMPTOMS</h3>
            <ul id="disease_symptoms" class="space-y-3">
                <li class="relative">
                    <button onclick="toggle_symptom_modal(this)" class="flex justify-center items-center bg-blue-100 rounded-full w-full h-10 p-5">
                        <span class="material-icons">
                            add
                        </span>
                        Add symptom
                    </button>
                    <div id="symptoms_modal" class="absolute top-0 w-full hidden z-50">
                        <div class="relative w-full max-h-96 bg-blue-100 rounded-lg shadow-md p-5 overflow-y-auto w-full">
                            <div class="sticky top-0 w-full bg-white flex justify-start items-center">
                                <input type="text" class="rounded-full w-full h-10 px-5 bg-blue-100" name="select_symptoms" oninput="search_symptom(this)">
                                <span class="material-icons cursor-pointer" onclick="toggle_symptom_modal(this)">
                                    close
                                </span>
                            </div>

                            <?php foreach ($symptoms as $symptom) : ?>
                                <div class="w-full p-3 hover:bg-blue-500 hover:text-blue-100 cursor-pointer symptom-item" onclick="add_field(this, 'symptom')">
                                    <span class="symptom-id mr-3"><?= $symptom['id']; ?></span>
                                    <span class="symptom-name"><?= $symptom['name']; ?></span>
                                </div>
                            <?php endforeach; ?>

                            <div class="w-full hidden no-result">
                                <p>
                                    No result.
                                    <a href="javascript:;" class="text-blue-500" onclick="create_symptom(this)">Create a new symptom with name "<span id="symptom_keyword"></span>"</a>
                                </p>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 animate-spin hidden loading-symptom">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div>
            <h3 class="font-bold">TREATMENTS</h3>

            <ul id="disease_treatments" class="space-y-3">
                <li class="relative">
                    <button onclick="toggle_treatment_modal(this)" class="flex justify-center items-center bg-blue-100 rounded-full w-full h-10 p-5">
                        <span class="material-icons">
                            add
                        </span>
                        Add treatment
                    </button>
                    <div id="treatments_modal" class="absolute top-0 w-full hidden z-50">
                        <div class="relative w-full max-h-96 bg-blue-100 rounded-lg shadow-md p-5 overflow-y-auto w-full">
                            <div class="sticky top-0 w-full bg-white flex justify-start items-center">
                                <input type="text" class="rounded-full w-full h-10 px-5 bg-blue-100" name="select_treatments" oninput="search_treatment(this)">
                                <span class="material-icons cursor-pointer" onclick="toggle_treatment_modal(this)">
                                    close
                                </span>
                            </div>

                            <?php foreach ($treatments as $treatment) : ?>
                                <div class="w-full p-3 hover:bg-blue-500 hover:text-blue-100 cursor-pointer treatment-item" onclick="add_field(this, 'treatment')">
                                    <span class="treatment-id mr-3"><?= $treatment['id']; ?></span>
                                    <span class="treatment-name"><?= $treatment['name']; ?></span>
                                </div>
                            <?php endforeach; ?>

                            <div class="w-full hidden no-result">
                                <p>
                                    No result.
                                    <a href="javascript:;" class="text-blue-500" onclick="create_treatment(this)">Create a new treatment with name "<span id="treatment_keyword"></span>"</a>
                                </p>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 animate-spin hidden loading-treatment">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="flex justify-end space-x-3">
            <button onclick="delete_disease()" class="flex justify-center items-center bg-red-500 text-white rounded-full h-10 p-5 hidden" id="delete_disease">
                <span class="material-icons">
                    delete
                </span>
                Delete Data
            </button>
            <button onclick="save_disease()" class="flex justify-center items-center bg-blue-500 text-white rounded-full h-10 p-5">
                <span class="material-icons">
                    save
                </span>
                Save Data
            </button>
        </div>
    </div>
</div>