<div class="modal-header">
    <h5 class="modal-title">Cliente <?= $cliente->nome; ?></h5>
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
    <div class="form-group">
        <label>Nome:</label>
        <?= $cliente->nome; ?>
    </div>
    <div class="form-group">
        <label>CPF:</label>
        <?= $cliente->cpf; ?>
    </div>
    <div class="form-group">
        <label>Data de Nascimento:</label>
        <?= $cliente->data_nascimento; ?>
    </div>
    <div class="form-group">
        <label>Telefone:</label>
        <?= $cliente->telefone ?: 'Vazio'; ?>
    </div>
</div>
<div class="modal-footer text-right">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
</div>
