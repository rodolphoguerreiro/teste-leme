<?php if(isset($type) && $type == 'ajax') : ?>
    <div id="fp-upload-xhr">
        <?= $this->Html->image($placeholder, ['fullBase' => true]); ?>
    </div>
<?php else : ?>
    <div id="fp-upload">
        <div id="fp-preview">
            <?php if($image) : ?>
                <?= $this->Html->image($image, ['class' => 'img-thumbnail', 'pathPrefix' => DS]); ?>
            <?php else : ?>
                <?= $this->Html->image('shapes/noprofile.png', ['class' => 'img-thumbnail']); ?>
            <?php endif; ?>
        </div>
        <div id="fp-actions" class="mt-2 text-center">
            <label class="btn btn-sm btn-info mb-0">
                <?= $this->Form->file('image', ['id' => 'fp-input', 'class' => 'd-none', 'accept' => '.png,.jpg,.svg,.bmp'])?>
                <?= __('select'); ?>
            </label>
            <button type="button" id="fp-clear" disabled="true" class="btn btn-sm disabled btn-danger"><?= __('remove'); ?></button>
        </div>
    </div>
<?php endif; ?>
