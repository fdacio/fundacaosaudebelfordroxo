<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CandidatosAnexos Model
 *
 * @property \App\Model\Table\CandidatosTable&\Cake\ORM\Association\BelongsTo $Candidatos
 *
 * @method \App\Model\Entity\CandidatosAnexo get($primaryKey, $options = [])
 * @method \App\Model\Entity\CandidatosAnexo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CandidatosAnexo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CandidatosAnexo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CandidatosAnexo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CandidatosAnexo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CandidatosAnexo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CandidatosAnexo findOrCreate($search, callable $callback = null, $options = [])
 */
class CandidatosAnexosTable extends Table
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

        $this->setTable('candidatos_anexos');
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
            ->scalar('nome')
            ->maxLength('nome', 60)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('arquivo')
            ->maxLength('arquivo', 255)
            ->requirePresence('arquivo', 'create')
            ->notEmptyString('arquivo');

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
