<div class="card shadow">
    <div class="card-body">
        <h4 class="text-info">Pedidos</h4>
        <hr>
        <div class="row">
            <div class="col-6">
                <?= $this->Html->link('Adicionar', ['action' => 'add'], ['data-modal' => 'modal-lg', 'class' => 'btn btn-sm btn-outline-info']); ?>
                <?= $this->Html->link('Exportar', ['action' => 'export'], ['class' => 'btn btn-sm btn-outline-success']) ?>
            </div>
            <div class="col-6">
                <?= $this->Flash->render(); ?>
            </div>
        </div>
        <table class="table table-hover table-striped border-bottom table-sm mt-3">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'ID'); ?></th>
                    <th><?= $this->Paginator->sort('cliente_id', 'Cliente'); ?></th>
                    <th><?= $this->Paginator->sort('pedido_status_id', 'Situação'); ?></th>
                    <th><?= $this->Paginator->sort('produto', 'Produto'); ?></th>
                    <th><?= $this->Paginator->sort('valor', 'Valor'); ?></th>
                    <th><?= $this->Paginator->sort('data', 'Data'); ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('ativo', 'Status'); ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('action', 'Ação'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if($pedidos->count() > 0) : ?>
                    <?php foreach ($pedidos as $pedido) : ?>
                        <tr>
                            <td class="align-middle text-center">
                                <?= $pedido->id; ?>
                            </td>
                            <td class="align-middle"><?= $pedido->cliente->nome; ?></td>
                            <td class="align-middle"><?= $pedido->pedido_status->descricao; ?></td>
                            <td class="align-middle"><?= $pedido->produto; ?></td>
                            <td class="align-middle"><?= $pedido->valor; ?></td>
                            <td class="align-middle"><?= $pedido->data->format('d-m-Y'); ?></td>
                            <td class="text-center align-middle">
                                <?= $pedido->ativo ? '<span class="text-success"><i class="fas fa-toggle-on"></i></span>' : '<span class="text-success"><i class="fas fa-toggle-off"></i></span>'; ?>
                            </td>
                            <td class="text-center align-middle">
                                <?= $this->Html->link('<i class="fas fa-eye"></i>', ['action' => 'view', $pedido->id], ['data-modal' => 'modal-lg', 'class' => 'btn btn-sm btn-dark', 'escape' => false]); ?>
                                <?= $this->Html->link('<i class="fas fa-edit"></i>', ['action' => 'edit', $pedido->id], ['data-modal' => 'modal-lg', 'class' => 'btn btn-sm btn-warning', 'escape' => false]); ?>
                                <?= $this->Form->postLink('<i class="fas fa-trash"></i>', ['action' => 'delete', $pedido->id], ['confirm' => 'Deseja mesmo remover este item?', 'class' => 'btn btn-sm btn-danger', 'escape' => false]); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <?= $this->element('pagination'); ?>
    </div>
</div>
