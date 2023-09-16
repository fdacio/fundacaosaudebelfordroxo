<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Turnos Model
 *
 * @method \App\Model\Entity\Turno get($primaryKey, $options = [])
 * @method \App\Model\Entity\Turno newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Turno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Turno|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Turno saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Turno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Turno[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Turno findOrCreate($search, callable $callback = null, $options = [])
 */
class TurnosTable extends Table
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

        $this->setTable('turnos');
        $this->setDisplayField('nome');
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 60)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome', ['message' => 'Informe o Nome.']);

        return $validator;
    }
}
