<div class="alert alert-success alert-dismissible fade show notification">
    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    <?= !isset($params['escape']) || $params['escape'] !== false ? html_entity_decode(h($message)) : ''; ?>
</div>
