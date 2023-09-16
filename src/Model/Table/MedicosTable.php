<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Medicos Model
 *
 * @method \App\Model\Entity\Medico get($primaryKey, $options = [])
 * @method \App\Model\Entity\Medico newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Medico[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Medico|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Medico saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Medico patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Medico[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Medico findOrCreate($search, callable $callback = null, $options = [])
 */
class MedicosTable extends Table
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

        $this->setTable('medicos');
        $this->setDisplayField('id');
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
            ->notEmptyString('nome');

        $validator
            ->scalar('matricula')
            ->maxLength('matricula', 30)
            ->requirePresence('matricula', 'create')
            ->notEmptyString('matricula');

        $validator
            ->scalar('crm')
            ->maxLength('crm', 30)
            ->requirePresence('crm', 'create')
            ->notEmptyString('crm');

        



        return $validator;
    }
}
