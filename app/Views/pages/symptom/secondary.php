<div id="secondary_symptom">
    <?= view('components/secondary_title.php', ['heading' => 'Symptom Detail']); ?>

    <div id="disease_form" class="space-y-5 px-5">
        <div>
            <h3 class="font-bold">SYMPTOM NAME</h3>
            <div class="">
                <input type="text" class="rounded-full w-full h-10 px-5 bg-blue-100" name="symptom_name">
            </div>
        </div>
        <div>
            <h3 class="font-bold">PATTERNS</h3>
            <ul id="symptom_patterns" class="space-y-3">
                <li class="relative">
                    <button onclick="add_field_symptom(this, 'pattern')" class="flex justify-center items-center bg-blue-100 rounded-full w-full h-10 p-5" id="add_pattern">
                        <span class="material-icons">
                            add
                        </span>
                        Add pattern
                    </button>
                </li>
            </ul>
        </div>
        <div>
            <h3 class="font-bold">RESPONSES</h3>
            <ul id="symptom_responses" class="space-y-3">
                <li class="relative">
                    <button onclick="add_field_symptom(this, 'response')" class="flex justify-center items-center bg-blue-100 rounded-full w-full h-10 p-5" id="add_response">
                        <span class="material-icons">
                            add
                        </span>
                        Add response
                    </button>
                </li>
            </ul>
        </div>
        <div class="flex justify-end space-x-3">
            <button onclick="delete_symptom()" class="flex justify-center items-center bg-red-500 text-white rounded-full h-10 p-5 hidden" id="delete_disease">
                <span class="material-icons">
                    delete
                </span>
                Delete Data
            </button>
            <button onclick="save_symptom()" class="flex justify-center items-center bg-blue-500 text-white rounded-full h-10 p-5">
                <span class="material-icons">
                    save
                </span>
                Save Data
            </button>
        </div>
    </div>
</div>