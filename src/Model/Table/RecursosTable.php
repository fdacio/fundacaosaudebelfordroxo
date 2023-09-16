<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Recursos Model
 *
 * @property \App\Model\Table\CandidatosTable&\Cake\ORM\Association\BelongsTo $Candidatos
 *
 * @method \App\Model\Entity\Recurso get($primaryKey, $options = [])
 * @method \App\Model\Entity\Recurso newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Recurso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Recurso|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Recurso saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Recurso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Recurso[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Recurso findOrCreate($search, callable $callback = null, $options = [])
 */
class RecursosTable extends Table
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

        $this->setTable('recursos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Candidatos', [
            'foreignKey' => 'candidatos_id',
            'joinType' => 'INNER'
        ]);
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
            ->dateTime('data')
            ->notEmptyDateTime('data');

        $validator
            ->scalar('questionamento')
            ->requirePresence('questionamento', 'create')
            ->notEmptyString('questionamento', 'Informe o texto do questionamento');

        $validator
            ->scalar('embasamento_legal')
            ->requirePresence('embasamento_legal', 'create')
            ->notEmptyString('embasamento_legal', 'Informe o texto do embasamento legal');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['candidatos_id'], 'Candidatos'));

        return $rules;
    }
}
