<!-- {{-- Statistic Page --}} -->
<div id="main_statistic" class="flex flex-col justify-center sticky top-0 bg-white px-5 pb-5 pt-10">
    <?= view('components/main_title', ['heading' => 'Tag', 'icon' => 'search']); ?>
    <!-- <label for="disease" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Search for Disease</label> -->
    <div class="relative mb-5">
        <div class="inline-flex items-center justify-center absolute right-0 top-0 h-full w-10 text-gray-400">
            <span class="material-icons text-blue-400">
                insert_chart
            </span>
        </div>
    </div>
</div>
<div id="disease_loading" class="hidden">
    <?= view('components/loading'); ?>
</div>

<div class="px-5 mb-5">
</div>
<!-- {{--End of Search or Home Page --}} -->