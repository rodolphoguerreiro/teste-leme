<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pedido Entity
 *
 * @property int $id
 * @property int $cliente_id
 * @property int $pedido_status_id
 * @property string $produto
 * @property float $valor
 * @property \Cake\I18n\FrozenTime $data
 * @property bool $ativo
 *
 * @property \App\Model\Entity\Cliente $cliente
 * @property \App\Model\Entity\PedidoStatus $pedido_status
 * @property \App\Model\Entity\PedidosImagen[] $pedidos_imagens
 */
class Pedido extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'cliente_id' => true,
        'pedido_status_id' => true,
        'produto' => true,
        'valor' => true,
        'data' => true,
        'ativo' => true,
        'cliente' => true,
        'pedido_status' => true,
        'pedidos_imagens' => true
    ];
}
