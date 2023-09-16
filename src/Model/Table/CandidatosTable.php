<?php

namespace App\Model\Table;

use App\FuncoesGerais;
use ArrayObject;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Candidatos Model
 *
 * @property \App\Model\Table\CargosTable&\Cake\ORM\Association\BelongsTo $Cargos
 *
 * @method \App\Model\Entity\Candidato get($primaryKey, $options = [])
 * @method \App\Model\Entity\Candidato newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Candidato[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Candidato|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Candidato saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Candidato patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Candidato[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Candidato findOrCreate($search, callable $callback = null, $options = [])
 */
class CandidatosTable extends Table
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

        $this->setTable('candidatos');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cargos', [
            'foreignKey' => 'cargos_id'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->scalar('nome')
            ->maxLength('nome', 80)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome', 'Informe o Nome');

        $validator
            ->scalar('cpf')
            ->maxLength('cpf', 20)
            ->requirePresence('cpf', 'create')
            ->notEmptyString('cpf', 'Informe o CPF')
            ->add('cpf', 'custom2', [
                'rule' => [
                    function ($cpf) {
                        $table = TableRegistry::getTableLocator()->get('Candidatos');
                        $candidato = $table->find()->where(['cpf = ' => $cpf, 'id >= ' => 120000 ])->first();
                        return (empty($candidato));
                    }
                ],
                'message' => 'CPF já cadastrado.'
            ])
            ->add('cpf', 'custom', [
                'rule' => [
                    function ($cpf) {
                        return (new FuncoesGerais())->validaCPF($cpf);
                    }
                ],
                'message' => 'CPF Inválido.'
            ]);

        $validator
            ->scalar('rg')
            ->maxLength('rg', 20)
            ->requirePresence('rg', 'create')
            ->notEmptyString('rg', 'Informe o RG');

        $validator
            ->date('nascimento')
            ->requirePresence('nascimento', 'create')
            ->notEmptyDate('nascimento', 'Informe a Data Nascimento');

        $validator
            ->scalar('profissao')
            ->maxLength('profissao', 100)
            ->requirePresence('profissao', 'create')
            ->notEmptyString('profissao', 'Informe a Profissão');

        $validator
            ->scalar('endereco')
            ->maxLength('endereco', 100)
            ->requirePresence('endereco', 'create')
            ->notEmptyString('endereco', 'Informe o Endereço');

        $validator
            ->scalar('numero')
            ->maxLength('numero', 10)
            ->requirePresence('numero', 'create')
            ->notEmptyString('numero', 'Informe o Número');

        $validator
            ->scalar('complemento')
            ->maxLength('complemento', 60)
            ->allowEmptyString('complemento');

        $validator
            ->scalar('bairro')
            ->maxLength('bairro', 60)
            ->requirePresence('bairro', 'create')
            ->notEmptyString('bairro', 'Informe o Bairro');

        $validator
            ->scalar('cep')
            ->maxLength('cep', 20)
            ->requirePresence('cep', 'create')
            ->notEmptyString('cep', 'Informe o CEP');

        $validator
            ->scalar('cidade')
            ->maxLength('cidade', 60)
            ->requirePresence('cidade', 'create')
            ->notEmptyString('cidade', 'Informe a Cidade');

        $validator
            ->scalar('uf')
            ->maxLength('uf', 60)
            ->requirePresence('uf', 'create')
            ->notEmptyString('uf', 'Informe a UF');

        $validator
            ->scalar('celular')
            ->maxLength('celular', 20)
            ->requirePresence('celular', 'create')
            ->notEmptyString('celular', 'Informe o Celular');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email', 'Infomre o e-Mail');

        $validator
            ->integer('cargos_id')
            ->requirePresence('cargos_id', 'create')
            ->notEmptyString('cargos_id', 'Informe o Cargo');
        
        $validator
            ->integer('processos_id')
            ->requirePresence('processos_id', 'create')
            ->notEmptyString('processos_id', 'Informe o Processo Seletivo');
        
        $validator
            ->integer('etnia')
            ->requirePresence('etnia', 'create')
            ->notEmptyString('etnia', 'Informe a Etnia');

        $validator
            ->integer('deficiencia')
            ->requirePresence('deficiencia', 'create')
            ->notEmptyString('deficiencia', 'Informe a Deficiência SIM/NÃO');

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
        //$rules->add($rules->isUnique(['email'], 'Email já cadastrado'));
        //$rules->add($rules->isUnique(['cpf'], 'CPF já cadastrado.'));
        $rules->add($rules->existsIn(['cargos_id'], 'Cargos'));

        return $rules;
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        $funcoesGerais = new FuncoesGerais();

        if (isset($data['nascimento'])) {
            $data['nascimento'] = $funcoesGerais->formataDataUSA($data['nascimento']);
        }

        if (isset($data['cpf'])) {
            $data['cpf'] = str_replace([
                '.',
                '-'
            ], '', $data['cpf']);
        }

        if (isset($data['celular'])) {
            $data['celular'] = str_replace([
                '.',
                '-',
                '(', ')', ' '
            ], '', $data['celular']);
        }

        if (isset($data['cep'])) {
            $data['cep'] = str_replace([
                '.',
                '-'
            ], '', $data['cep']);
        }
    }
}
