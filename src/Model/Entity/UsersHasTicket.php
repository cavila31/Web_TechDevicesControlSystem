<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UsersHasTicket Entity.
 *
 * @property int $users_id
 * @property \App\Model\Entity\User $user
 * @property int $tickets_id
 * @property \App\Model\Entity\Ticket $ticket
 * @property int $tipo
 * @property int $id
 */
class UsersHasTicket extends Entity
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
        'users_id' => false,
        'tickets_id' => false,
        'tipo' => true,
    ];
}
