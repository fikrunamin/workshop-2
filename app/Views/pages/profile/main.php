<div id="main_profile" class="flex flex-col justify-center sticky top-0 bg-white mb-5 px-5 pb-5 pt-10">
    <?= view('components/main_title', ['heading' => 'PROFILE', 'icon' => 'perm_identity']); ?>
    <h1 class="text-xl font-semibold">Profile</h1>
</div>
<div>
    <ul class="flex flex-col justify-center px-5 divide-solid">
        <li class="mt-3 p-5 rounded-lg bg-blue-100 text-blue-500 w-full cursor-pointer">
            <h2>Edit Profile</h2>
        </li>
        <hr class="mt-3">
        <li class="mt-3 p-5 rounded-lg bg-blue-500 text-blue-100 w-full cursor-pointer">
            <a href="<?= route_to('logout'); ?>">
                <h2>Logout</h2>
            </a>
        </li>
    </ul>
</div>