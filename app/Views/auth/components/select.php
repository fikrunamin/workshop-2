<div class="grid grid-cols-1 gap-y-2">
    <div>
        <label for="<?= $name ?? strtolower($field); ?>" class="text-sm text-white"><?= $field; ?></label>
    </div>
    <div class="relative">
        <select name="<?= $name ?? strtolower($field); ?>" id="<?= $name ?? strtolower($field); ?>" class="rounded-full py-2 focus:ring focus:ring-blue-300 w-full appearance-none pl-5 pr-10 outline-none">
            <?php foreach ($options  as $option) : ?>
                <option value="<?= str_replace('.', '', strtolower($option)); ?>" <?= isset($value) && $value == str_replace('.', '', strtolower($option)) ? 'selected' : ''; ?>><?= $option; ?></option>
            <?php endforeach; ?>
        </select>

        <?php if (isset($icon)) : ?>
            <div class=" absolute right-4 bottom-0.5">
                <span class="material-icons text-blue-400">
                    <?= $icon; ?>
                </span>
            </div>
        <?php endif; ?>
    </div>
</div>