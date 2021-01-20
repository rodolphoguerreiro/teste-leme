<div class="card shadow">
    <div class="card-body">
        <h4 class="text-info">Clientes</h4>
        <hr>
        <div class="row">
            <div class="col-6">
                <?= $this->Html->link('Adicionar', ['action' => 'add'], ['data-modal' => 'modal-md', 'class' => 'btn btn-sm btn-outline-info']); ?>
            </div>
            <div class="col-6">
                <?= $this->Flash->render(); ?>
            </div>
        </div>
        <table class="table table-hover table-striped border-bottom table-sm mt-3">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'ID'); ?></th>
                    <th><?= $this->Paginator->sort('nome', 'Nome'); ?></th>
                    <th><?= $this->Paginator->sort('cpf', 'CPF'); ?></th>
                    <th><?= $this->Paginator->sort('data_nascimento', 'Nascimento'); ?></th>
                    <th><?= $this->Paginator->sort('telefone', 'Telefone'); ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('ativo', 'Status'); ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('action', 'Ação'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if($clientes->count() > 0) : ?>
                    <?php foreach ($clientes as $cliente) : ?>
                        <tr>
                            <td class="align-middle text-center">
                                <?= $cliente->id; ?>
                            </td>
                            <td class="align-middle"><?= $cliente->name; ?></td>
                            <td class="align-middle"><?= $cliente->cpf; ?></td>
                            <td class="align-middle"><?= $cliente->data_nascimento->format('d-m-Y'); ?></td>
                            <td class="align-middle"><?= $cliente->telefone; ?></td>
                            <td class="text-center align-middle">
                                <?= $cliente->ativo ? '<span class="text-success"><i class="fas fa-toggle-on"></i></span>' : '<span class="text-success"><i class="fas fa-toggle-off"></i></span>'; ?>
                            </td>
                            <td class="text-center align-middle">
                                <?= $this->Html->link('<i class="fas fa-eye"></i>', ['action' => 'view', $cliente->id], ['data-modal' => 'modal-md', 'class' => 'btn btn-sm btn-dark', 'escape' => false]); ?>
                                <?= $this->Html->link('<i class="fas fa-edit"></i>', ['action' => 'edit', $cliente->id], ['data-modal' => 'modal-md', 'class' => 'btn btn-sm btn-warning', 'escape' => false]); ?>
                                <?= $this->Form->postLink('<i class="fas fa-trash"></i>', ['action' => 'delete', $cliente->id], ['confirm' => 'Deseja mesmo remover este item?', 'class' => 'btn btn-sm btn-danger', 'escape' => false]); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <?= $this->element('pagination'); ?>
    </div>
</div>
