<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Turmas Model
 *
 * @method \App\Model\Entity\Turma get($primaryKey, $options = [])
 * @method \App\Model\Entity\Turma newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Turma[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Turma|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Turma saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Turma patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Turma[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Turma findOrCreate($search, callable $callback = null, $options = [])
 */
class TurmasTable extends Table
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

        $this->setTable('turmas');
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
