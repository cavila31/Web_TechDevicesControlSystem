<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity.
 *
 * @property string $username
 * @property string $password
 * @property string $nombre
 * @property int $cedula
 * @property string|resource $foto_id
 * @property \App\Model\Entity\Foto $foto
 * @property string $role
 * @property int $id
 */
class User extends Entity
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

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    
        protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
    
}
