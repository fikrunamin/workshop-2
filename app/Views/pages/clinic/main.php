<!-- {{-- Clinic Page --}} -->

<div id="main_clinic" class="flex flex-col justify-center sticky top-0 bg-white mb-5 px-5 pb-5 pt-10">
    <?= view('components/main_title', ['heading' => 'NEAREST CLINIC', 'icon' => 'local_hospital']); ?>

    <p id="result_clinic">Looking for the closest clinics to you...</p>
</div>

<div class="flex flex-col justify-center mb-5">
    <div id="loading_clinic">
        <?= view('components/loading'); ?>
    </div>

    <ul id="clinic_list" class="flex flex-col w-full px-5" onload="getLocation()">
    </ul>
</div>


<!-- {{-- End of Clinic Page --}} -->