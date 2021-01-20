<?php
use Migrations\AbstractSeed;

/**
 * Settings seed.
 */
class PedidoStatusSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'descricao' => 'Solicitado',
            ],[
                'id' => 2,
                'descricao' => 'Concluído',
            ],[
                'id' => 3,
                'descricao' => 'Cancelado',
            ],
        ];

        $table = $this->table('pedido_status');
        $table->insert($data)->save();
    }
}
