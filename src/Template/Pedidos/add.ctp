<?= $this->Html->script(['galery']); ?>
<?= $this->Form->create($pedido, ['id' => 'formPedido', 'url' => ['action' => 'add'], 'type' => 'file']); ?>
    <div class="modal-header">
        <h5 class="modal-title">Adicionar Pedido</h5>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-3">
                <div id="fp-upload">
                    <div id="fp-preview">
                        <?= $this->Html->image('noimage.png', ['class' => 'img-thumbnail']); ?>
                    </div>
                    <div id="fp-actions" class="mt-2 text-center">
                        <label class="btn btn-sm btn-info mb-0">
                            <?= $this->Form->file('image', ['id' => 'fp-input', 'class' => 'd-none', 'accept' => '.png,.jpg,.svg,.bmp'])?>
                            Selecione
                        </label>
                        <button type="button" id="fp-clear" disabled="true" class="btn btn-sm disabled btn-danger">Remover</button>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="form-group">
                    <div class="row">
                        <div class="col-8">
                            <label>Clientes *</label>
                            <?= $this->Form->control('cliente_id', ['class' => 'form-control', 'options' => $clientes, 'label' => false, 'empty' => 'Selecione...', 'required' => true]); ?>
                        </div>
                        <div class="col-4">
                            <label>Status *</label>
                            <?= $this->Form->control('ativo', ['class' => 'form-control', 'label' => false, 'options' => [0 => 'Inativo', 1 => 'Ativo'], 'default' => 1]); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-8">
                            <label>Produto *</label>
                            <?= $this->Form->control('produto', ['class' => 'form-control', 'label' => false]); ?>
                        </div>
                        <div class="col-4">
                            <label>Situação *</label>
                            <?= $this->Form->control('pedido_status_id', ['class' => 'form-control', 'options' => $situacoes, 'label' => false, 'empty' => false, 'required' => true]); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-8">
                            <label>Data *</label>
                            <div class="d-flex">
                                <div class="flex-fill">
                                    <?= $this->Form->day('data', ['class' => 'form-control', 'empty' => 'Dia', 'required' => true]); ?>
                                </div>
                                <div class="flex-fill mx-2">
                                    <?= $this->Form->month('data', ['class' => 'form-control', 'empty' => 'Mês', 'required' => true]); ?>
                                </div>
                                <div class="flex-fill">
                                    <?= $this->Form->year('data', ['class' => 'form-control', 'empty' => 'Ano', 'minYear' => date('Y'), 'required' => true]); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <label>Valor *</label>
                            <?= $this->Form->control('valor', ['type' => 'text', 'class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => '0.00']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <?= $this->Form->button('Salvar', ['class' => 'btn btn-info']) ?>
    </div>
<?= $this->Form->end(); ?>
<script type="text/javascript">
    $('input[name="valor"]').mask('#.00', {reverse: true});
    $("#formPedido").validate({
        rules: {
            cliente_id: {
                required: true,
            },
            produto: {
                required: true
            },
            valor: {
                required: true
            },
        },
        messages: {
            cliente_id: {
                required: 'Informe o cliente',
            },
            produto: {
                required: 'Informe um nome do produto',
            },
            valor: {
                required: 'Informe um valor',
            },
        }
    });

    $('[name^="data"]').each(function() {
        $(this).rules('add', {
            required: true,
            messages: {
                required: "Campo requerido",
            }
        })
    });
</script>
