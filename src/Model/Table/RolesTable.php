<?php
namespace RoleAuth\Model\Table;

use Cake\Datasource\EntityInterface;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use RoleAuth\Model\Entity\Role;

/**
 * Roles Model
 *
 * @method Role get($primaryKey, $options = [])
 * @method Role newEntity($data = null, array $options = [])
 * @method Role[] newEntities(array $data, array $options = [])
 * @method Role|bool save(EntityInterface $entity, $options = [])
 * @method Role patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method Role[] patchEntities($entities, array $data, array $options = [])
 * @method Role findOrCreate($search, callable $callback = null, $options = [])
 */
class RolesTable extends Table
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

        $this->setTable('roles');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->integer('permissions')
            ->requirePresence('permissions', 'create')
            ->notEmpty('permissions');

        return $validator;
    }
}
