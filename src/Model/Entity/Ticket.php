<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ticket Entity.
 *
 * @property int $id
 * @property string $modelo
 * @property string $serie
 * @property string $marca
 * @property string|resource $codigo_QR
 * @property string $placa_universitaria
 * @property string $tipo_activo
 * @property string $observaciones
 * @property \Cake\I18n\Time $fecha_solicitud
 * @property \Cake\I18n\Time $fecha_expiracion
 * @property string $estado
 * @property \App\Model\Entity\User[] $users
 */
class Ticket extends Entity
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
        '*' => true,
        'id' => false,
    ];
}
