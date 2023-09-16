<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use App\FuncoesGerais;

/**
 * Alunos Model
 *
 * @method \App\Model\Entity\Aluno get($primaryKey, $options = [])
 * @method \App\Model\Entity\Aluno newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Aluno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Aluno|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Aluno saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Aluno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Aluno[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Aluno findOrCreate($search, callable $callback = null, $options = [])
 */
class PacientesTable extends Table
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

        $this->setTable('pacientes');
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
            ->maxLength('nome', 80)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome', ['message' => 'Informe o Nome.']);

        $validator
            ->date('nascimento')
            ->requirePresence('nascimento', 'create')
            ->notEmptyDate('nascimento', ['message' => 'Informe o Nascimento.']);

        $validator
            ->boolean('menor')
            ->requirePresence('menor', 'create')
            ->notEmptyString('menor', ['message' => 'Informe se é Menor.']);

        $validator
            ->scalar('endereco')
            ->maxLength('endereco', 100)
            ->requirePresence('endereco', 'create')
            ->notEmptyString('endereco', ['message' => 'Informe o Endereço.']);

        $validator
            ->scalar('numero')
            ->maxLength('numero', 10)
            ->requirePresence('numero', 'create')
            ->notEmptyString('numero', ['message' => 'Informe o Número.']);

        $validator
            ->scalar('complemento')
            ->maxLength('complemento', 60)
            ->allowEmptyString('complemento');

        $validator
            ->scalar('bairro')
            ->maxLength('bairro', 60)
            ->requirePresence('bairro', 'create')
            ->notEmptyString('bairro', ['message' => 'Informe o Bairro.']);

        $validator
            ->scalar('cep')
            ->maxLength('cep', 20)
            ->requirePresence('cep', 'create')
            ->notEmptyString('cep', ['message' => 'Informe o CEP.']);

        $validator
            ->scalar('cidade')
            ->maxLength('cidade', 60)
            ->requirePresence('cidade', 'create')
            ->notEmptyString('cidade', ['message' => 'Informe a Cidade.']);

        $validator
            ->scalar('uf')
            ->maxLength('uf', 2)
            ->requirePresence('uf', 'create')
            ->notEmptyString('uf', ['message' => 'Informe a UF.']);

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 20)
            ->allowEmptyString('telefone');

        $validator
            ->scalar('whatsapp')
            ->maxLength('whatsapp', 20)
            ->allowEmptyString('whatsapp');

        return $validator;
    }
    
    public function beforeMarshal(Event $event, \ArrayObject $data, \ArrayObject $options)
    {
        $funcoesGerais = new FuncoesGerais();

        if (isset($data['nascimento']) && $data['nascimento']) {
            $data['nascimento'] = $funcoesGerais->formataDataUsa($data['nascimento']);
        }
        if (isset($data['telefone']) && $data['telefone']) {
            $data['telefone'] = $funcoesGerais->desformataTelefone($data['telefone']);
        }

        if (isset($data['whatsapp']) && $data['whatsapp']) {
            $data['whatsapp'] = $funcoesGerais->desformataTelefone($data['whatsapp']);
        }
        
        if (isset($data['cep']) && $data['cep']) {
            $data['cep'] = $funcoesGerais->desformataCep($data['cep']);
        }
    }
    
}
