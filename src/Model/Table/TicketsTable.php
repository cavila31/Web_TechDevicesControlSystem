<?php
namespace App\Model\Table;

use App\Model\Entity\Ticket;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tickets Model
 *
 * @property \Cake\ORM\Association\HasMany $UsersHasTickets
 */
class TicketsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('tickets');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsToMany('Users',
            [
            'through' => 'UsersHasTickets',
            'targetForeignKey' => 'user_id',
            'foreignKey' => 'ticket_id',
            'joinTable' => 'users_has_tickets'
        ]
        );

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('modelo');

        $validator
            ->allowEmpty('serie');

        $validator
            ->allowEmpty('marca');

        $validator
            ->allowEmpty('codigo_QR');

        $validator
            ->allowEmpty('placa_universitaria');

        $validator
            ->allowEmpty('tipo_activo');

        $validator
            ->allowEmpty('observaciones');

        $validator
            ->date('fecha_solicitud')
            ->requirePresence('fecha_solicitud', 'create')
            ->notEmpty('fecha_solicitud');

        $validator
            ->date('fecha_expiracion')
            ->allowEmpty('fecha_expiracion');

        $validator
            ->allowEmpty('estado');

        return $validator;
    }
}
