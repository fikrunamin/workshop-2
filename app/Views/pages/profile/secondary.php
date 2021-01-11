<div id="secondary_profile">
    <?= view('components/secondary_title', ['heading' => 'Profile Detail']); ?>

    <div>
        <div class="grid grid-cols-1 px-5 gap-y-5">
            <div class="grid grid-cols-1">
                <div>
                    <h2 class="font-semibold text-blue-500 text-xl mb-2">Profile Information</h2>
                </div>
                <div>
                    <p class="font-normal text-sm mb-5">Update your account's profile information and email address.</p>
                </div>
                <div>
                    <div class="bg-blue-500 rounded-3xl py-5 px-10 grid grid-cols-4 gap-x-5">
                        <div>
                            <?= view('auth/components/select', ['field' => 'Prefix', 'options' => ['Mr.', 'Mrs.'], 'icon' => 'keyboard_arrow_down', 'value' => session('data_user')['gender'] == 'male' ? 'mr' : 'mrs']); ?>
                        </div>
                        <div class="col-span-3">
                            <?= view('auth/components/input', ['field' => 'Fullname', 'type' => 'text', 'icon' => '', 'value' => session('data_user')['fullname']]); ?>
                        </div>
                        <div class="col-span-2">
                            <?= view('auth/components/input', ['field' => 'Birthdate', 'type' => 'date', 'icon' => 'date_range', 'value' => session('data_user')['birthdate']]); ?>
                        </div>
                        <div class="col-span-2">
                            <?= view('auth/components/input', ['field' => 'Occupation', 'type' => 'text', 'icon' => '', 'value' => ucwords(session('data_user')['occupation'])]); ?>
                        </div>
                        <div class="col-span-full flex justify-end items-center mt-5">
                            <button type="button" name="profile_information" onclick="update_profile(this)" class="text-center bg-white text-blue-500 shadow-md font-semibold py-2 px-5 rounded-3xl">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1">
                <div>
                    <h2 class="font-semibold text-blue-500 text-xl mb-2">Update Email & Password</h2>
                </div>
                <div>
                    <p class="font-normal text-sm mb-5">Ensure your account is using a long, random password to stay secure.</p>
                </div>
                <div class="bg-blue-500 rounded-3xl py-5 px-10 grid grid-cols-4 gap-x-5">
                    <div class="col-span-full">
                        <?= view('auth/components/input', ['field' => 'Email', 'type' => 'email', 'icon' => '', 'value' => session('email')]); ?>
                    </div>
                    <div class="col-span-full">
                        <?= view('auth/components/input', ['field' => 'Password', 'type' => 'password', 'icon' => '', 'value' => '']); ?>
                    </div>
                    <div class="col-span-full">
                        <?= view('auth/components/input', ['field' => 'Confirm Password', 'type' => 'password', 'name' => 'confirm_password', 'icon' => '', 'value' => '']); ?>
                    </div>
                    <div class="col-span-full flex justify-end items-center mt-5">
                        <button type="submit" name="update_email_and_password" onclick="update_profile(this)" class="text-center bg-white text-blue-500 shadow-md font-semibold py-2 px-5 rounded-3xl">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>