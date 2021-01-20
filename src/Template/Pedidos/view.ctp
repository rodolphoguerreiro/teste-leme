<div class="modal-header">
    <h5 class="modal-title">Pedido Nº <?= $pedido->id; ?></h5>
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-3">
            <?php if(!empty($pedido->pedidos_imagens)) : ?>
                <?= $this->Html->image($pedido->pedidos_imagens[0]->imagem, ['class' => 'img-thumbnail']); ?>
            <?php else : ?>
                <?= $this->Html->image('noimage.png', ['class' => 'img-thumbnail']); ?>
            <?php endif; ?>
        </div>
        <div class="col-9">
            <div class="form-group">
                <label>Cliente:</label>
                <?= $pedido->cliente->nome; ?>
            </div>
            <div class="form-group">
                <label>Produto:</label>
                <?= $pedido->produto; ?>
            </div>
            <div class="form-group">
                <label>Valor:</label>
                <?= $pedido->valor; ?>
            </div>
            <div class="form-group">
                <label>Situação:</label>
                <?= $pedido->pedido_status->descricao; ?>
            </div>
            <div class="form-group">
                <label>Data de Nascimento:</label>
                <?= $pedido->data; ?>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer text-right">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
</div>
