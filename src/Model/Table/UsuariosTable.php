<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsuariosTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('usuarios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 25)
            ->notEmptyString('nome');

        $validator
            ->scalar('sobrenome')
            ->maxLength('sobrenome', 25)
            ->notEmptyString('sobrenome');

        $validator
            ->email('email')
            ->notEmptyString('email');

        $validator
            ->scalar('senha')
            ->maxLength('senha', 255)
            ->notEmptyString('senha', ['message' => 'Informe uma senha'])
                ->add('senha', 'custom', [
                    'rule' => function($senha, $context){
                    if($senha != $context['data']['confirmacao_senha']){
                        return false;
                    }
                    return true;
                },'message' => 'Senha e confirmação de senha não conferem.']);

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
