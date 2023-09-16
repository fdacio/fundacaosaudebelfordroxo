<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Matriculas Model
 *
 * @property \App\Model\Table\AlunosTable&\Cake\ORM\Association\BelongsTo $Alunos
 * @property \App\Model\Table\CursosTable&\Cake\ORM\Association\BelongsTo $Cursos
 * @property \App\Model\Table\TurnosTable&\Cake\ORM\Association\BelongsTo $Turnos
 * @property \App\Model\Table\TurmasTable&\Cake\ORM\Association\BelongsTo $Turmas
 *
 * @method \App\Model\Entity\Matricula get($primaryKey, $options = [])
 * @method \App\Model\Entity\Matricula newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Matricula[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Matricula|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Matricula saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Matricula patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Matricula[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Matricula findOrCreate($search, callable $callback = null, $options = [])
 */
class MatriculasTable extends Table
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

        $this->setTable('matriculas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Alunos', [
            'foreignKey' => 'alunos_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Cursos', [
            'foreignKey' => 'cursos_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Turnos', [
            'foreignKey' => 'turnos_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Turmas', [
            'foreignKey' => 'turmas_id',
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
            ->integer('alunos_id')
            ->requirePresence('alunos_id', 'create')
            ->notEmptyString('alunos_id', ['message' => 'Informe o Aluno.']);

        $validator
            ->integer('cursos_id')
            ->requirePresence('cursos_id', 'create')
            ->notEmptyString('cursos_id', ['message' => 'Informe o Curso.']);
            
        $validator
            ->integer('turnos_id')
            ->requirePresence('turnos_id', 'create')
            ->notEmptyString('turnos_id', ['message' => 'Informe o Turno.']);
            
        $validator
            ->integer('turmas_id')
            ->requirePresence('turmas_id', 'create')
            ->notEmptyString('turmas_id', ['message' => 'Informe a Turma.']);
        
        $validator
            ->time('hora_ini')
            ->requirePresence('hora_ini', 'create')
            ->notEmptyTime('hora_ini', ['message' => 'Informe o Horário.']);

        $validator
            ->time('hora_fim')
            ->requirePresence('hora_fim', 'create')
            ->notEmptyTime('hora_fim', ['message' => 'Informe o Horário.']);

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
        $rules->add($rules->existsIn(['alunos_id'], 'Alunos'));
        $rules->add($rules->existsIn(['cursos_id'], 'Cursos'));
        $rules->add($rules->existsIn(['turnos_id'], 'Turnos'));
        $rules->add($rules->existsIn(['turmas_id'], 'Turmas'));

        return $rules;
    }
}
