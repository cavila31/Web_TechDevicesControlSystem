<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Fotos
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');
        
        //$this->belongsToMany('tickets', ['through' => 'UsersHasTicket']);
        $this->belongsToMany('Tickets',
            [
            'through' => 'UsersHasTickets',
            'targetForeignKey' => 'ticket_id',
            'foreignKey' => 'user_id',
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
            ->requirePresence('username', 'create', 'edit')
            ->notEmpty('username', 'El correo es requerido')
            ->email('username', 'Debe ser un correo válido en el dominio ucr.ac.cr.');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password', 'La contraseña es requerida')
            ->lengthBetween('password', [7, 255], 'La contraseña debe tener al menos 7 caracteres.');

        $validator
            ->requirePresence('nombre', 'create', 'edit')
            ->notEmpty('nombre')
            ->lengthBetween('nombre', [3, 40], 'El nombre no debe ser vacio ni exceder los 40 caracteres.');

        $validator
            ->integer('cedula')
            ->allowEmpty('cedula');
        $validator
            ->allowEmpty('role');

        $validator
            ->integer('id')
            ->notEmpty('id');
            
        $validator
            ->notEmpty('active');
            
        $validator
            ->allowEmpty('reset_password_token');  
 
        $validator
            ->allowEmpty('token_created_at');            

        return $validator;
    }


    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
     
     
     
     public function validationPassword(Validator $validator )
    {
 
        $validator
            ->add('old_password','custom',[
                'rule'=>  function($value, $context){
                    $user = $this->get($context['data']['id']);
                    if ($user) {
                        if ((new DefaultPasswordHasher)->check($value, $user->password)) {
                            return true;
                        }
                    }
                    return false;
                },          
                'message'=>'La contraseña no coincide con la contraseña anterior',
            ])
            ->notEmpty('old_password');
 
        $validator
            ->add('password1', [
                'length' => [
                    'rule' => ['minLength', 6],
                    'message' => 'La contraseña debe tener al menos 7 caracteres',
                ]
            ])
            ->add('password1',[
                'match'=>[
                    'rule'=> ['compareWith','password2'],
                    'message'=>'Las contraseñas no coinciden',
                ]
            ])
            ->notEmpty('password1');
        $validator
            ->add('password2', [
                'length' => [
                    'rule' => ['minLength', 6],
                    'message' => 'La contraseña debe tener al menos 7 caracteres',
                ]
            ])
            ->add('password2',[
                'match'=>[
                    'rule'=> ['compareWith','password1'],
                    'message'=>'Las contraseñas no coinciden',
                ]
            ])
            ->notEmpty('password2');
 
        return $validator;
    }
}
