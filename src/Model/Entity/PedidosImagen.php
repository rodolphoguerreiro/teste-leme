<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PedidosImagen Entity
 *
 * @property int $id
 * @property int $pedido_id
 * @property string $imagem
 * @property string $capa
 *
 * @property \App\Model\Entity\Pedido $pedido
 */
class PedidosImagen extends Entity
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
        'pedido_id' => true,
        'imagem' => true,
        'capa' => true,
        'pedido' => true
    ];
}
