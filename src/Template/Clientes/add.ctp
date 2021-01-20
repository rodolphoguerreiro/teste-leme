<?= $this->Form->create($cliente, ['id' => 'formCliente', 'url' => ['action' => 'add']]); ?>
    <div class="modal-header">
        <h5 class="modal-title">Adicionar novo Cliente</h5>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <div class="row">
                <div class="col-8">
                    <label>Nome *</label>
                    <?= $this->Form->control('nome', ['class' => 'form-control', 'label' => false, 'required' => true]); ?>
                </div>
                <div class="col-4">
                    <label><?= __('Status'); ?> *</label>
                    <?= $this->Form->control('ativo', ['class' => 'form-control', 'label' => false, 'options' => [0 => 'Inativo', 1 => 'Ativo'], 'default' => 1]); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>CPF *</label>
            <?= $this->Form->control('cpf', ['class' => 'form-control', 'label' => false, 'required' => true]); ?>
        </div>
        <div class="form-group">
            <label>Data de Nascimento *</label>
            <div class="d-flex">
                <div class="flex-fill">
                    <?= $this->Form->day('data_nascimento', ['class' => 'form-control', 'empty' => 'Dia', 'required' => true]); ?>
                </div>
                <div class="flex-fill mx-2">
                    <?= $this->Form->month('data_nascimento', ['class' => 'form-control', 'empty' => 'Mês', 'required' => true]); ?>
                </div>
                <div class="flex-fill">
                    <?= $this->Form->year('data_nascimento', ['class' => 'form-control', 'empty' => 'Ano', 'minYear' => 1921, 'maxYear' => date('Y'), 'required' => true]); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Telefone</label>
            <?= $this->Form->control('telefone', ['class' => 'form-control', 'label' => false]); ?>
        </div>
    </div>
    <div class="modal-footer text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <?= $this->Form->button('Salvar', ['class' => 'btn btn-info']) ?>
    </div>
<?= $this->Form->end(); ?>
<script type="text/javascript">
    $('input[name="cpf"]').mask('000.000.000-00', {reverse: true});
    $('input[name="telefone"]').mask('(00) 0000-0000');
    $("#formCliente").validate({
        rules: {
            nome: {
                required: true,
                minlength: 3
            },
            cpf: {
                cpf: true,
                required: true
            },
        },
        messages: {
            nome: {
                required: 'Informe seu nome',
                minlength: 'Seu nome deve conter ao menos 3 letras'
            },
            cpf: {
                required: 'Informe um CPF',
                cpf: 'CPF inválido'
            },
        }
    });

    $('[name^="data_nascimento"]').each(function() {
        $(this).rules('add', {
            required: true,
            messages: {
                required: "Campo requerido",
            }
        })
    });
</script>
