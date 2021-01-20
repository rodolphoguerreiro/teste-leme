<?php
use Migrations\AbstractMigration;

class Clientes extends AbstractMigration
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
        $table = $this->table('clientes');
        $table->addColumn('nome', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('cpf', 'string', [
            'default' => null,
            'limit' => 15,
            'null' => false,
        ]);
        $table->addColumn('data_nascimento', 'datetime', [
            'default' => null,
            'limit' => null,
            'null' => false,
        ]);
        $table->addColumn('telefone', 'string', [
            'default' => null,
            'limit' => 15,
            'null' => true,
        ]);
        $table->addColumn('ativo', 'boolean', [
            'default' => false,
            'limit' => null,
            'null' => true,
        ]);
        $table->create();
    }
}
