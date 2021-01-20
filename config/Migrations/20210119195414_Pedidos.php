<?php
use Migrations\AbstractMigration;

class Pedidos extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('pedidos');
        $table->addColumn('cliente_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('pedido_status_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('produto', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('valor', 'decimal', [
            'default' => null,
            'precision' => 10,
            'scale' => 2,
            'null' => true,
        ]);
        $table->addColumn('data', 'datetime', [
            'default' => null,
            'limit' => null,
            'null' => false,
        ]);
        $table->addColumn('ativo', 'boolean', [
            'default' => false,
            'limit' => null,
            'null' => true,
        ]);
        $table->create();
    }
}
