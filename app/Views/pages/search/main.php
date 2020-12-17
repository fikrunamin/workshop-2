<!-- {{-- Search or Home Page --}} -->
<div id="main_search" class="flex flex-col justify-center sticky top-0 bg-white mb-5 px-5 pb-5 pt-10 shadow-md">
    <?= view('components/main_title', ['heading' => 'SEARCH', 'icon' => 'search']); ?>
    <label for="disease" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Search for Disease</label>
    <div class="relative mb-5">
        <div class="inline-flex items-center justify-center absolute right-0 top-0 h-full w-10 text-gray-400">
            <span class="material-icons text-blue-400">
                search
            </span>
        </div>
        <input id="disease" oninput="search_disease(this)" type="text" name="disease" class="text-sm text-base placeholder-gray-500 pl-4 pr-10 rounded-full bg-blue-100 w-full py-2" placeholder="Caries Media" />
    </div>
</div>
<div id="disease_loading" class="hidden">
    <?= view('components/loading'); ?>
</div>

<div class="px-5 mb-5">
    <ul id="disease_list" class="flex flex-col justify-center w-full">

    </ul>
</div>
<!-- {{--End of Search or Home Page --}} -->