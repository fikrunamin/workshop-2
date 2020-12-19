<div class="grid grid-cols-1 gap-y-2 relative">
    <div>
        <label for="<?= $name ?? strtolower($field); ?>" class="text-sm text-white"><?= $field; ?></label>
    </div>
    <div class="relative">
        <input type="<?= $type; ?>" name="<?= $name ?? strtolower($field); ?>" id="<?= $name ?? strtolower($field); ?>" placeholder="<?= $field; ?>" value="<?= $value ?? ''; ?>" class="rounded-full py-2 pl-5 pr-10 focus:ring focus:ring-blue-300 w-full outline-none">

        <?php if (isset($icon)) : ?>
            <div class="absolute right-4 bottom-0.5 cursor-pointer">
                <span class="material-icons text-blue-400">
                    <?= $icon; ?>
                </span>
            </div>
        <?php endif; ?>
    </div>
</div>