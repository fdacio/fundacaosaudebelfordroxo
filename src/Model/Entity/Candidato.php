<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Candidato Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $cpf
 * @property string $rg
 * @property \Cake\I18n\FrozenDate $nascimento
 * @property string $profissao
 * @property string $endereco
 * @property string $numero
 * @property string|null $complemento
 * @property string $bairro
 * @property string $cep
 * @property string $cidade
 * @property string $uf
 * @property string $celular
 * @property string $email
 * @property bool $curso_superior
 * @property int|null $cargos_id
 * @property int|null $usuarios_1
 * @property int|null $usuarios_2
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $criado
 * @property \Cake\I18n\FrozenTime $alterado
 *
 * @property \App\Model\Entity\Cargo $cargo
 */
class Candidato extends Entity
{
    const ETINIAS = [
        1 => 'Branco',
        2 => 'Pardo',
        3 => 'Negro',
        4 => 'Indigena',
        5 => 'Cafuso',
        6 => 'Mulato'
    ];

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nome' => true,
        'cpf' => true,
        'rg' => true,
        'nascimento' => true,
        'profissao' => true,
        'endereco' => true,
        'numero' => true,
        'complemento' => true,
        'bairro' => true,
        'cep' => true,
        'cidade' => true,
        'uf' => true,
        'celular' => true,
        'email' => true,
        'curso_superior' => true,
        'etnia' => true,
        'deficiencia' => true,
        'cargos_id' => true,
        'processo_id' => true,
        'usuarios_1' => true,
        'usuarios_2' => true,
        'status' => true,
        'criado' => true,
        'alterado' => true,
        'cargo' => true
    ];

    public function _getProcesso()
    {
        if (!empty($this->processos_id)) {
            return (TableRegistry::getTableLocator()->get('Processos'))->get($this->processos_id);
        } else {
            return NULL;
        }
    }

    public function _getCargo()
    {
        return (TableRegistry::getTableLocator()->get('Cargos'))->get($this->cargos_id);
    }

    public function _getEnderecoCompleto()
    {
        $enderecoCompleto = $this->endereco . ', ' . $this->numero;
        if ($this->complemento) {
            $enderecoCompleto .= ' - ' . $this->complemento;
        }
        $enderecoCompleto .= ' - ' . $this->bairro . ' - ' . $this->cep . ' - ' . $this->cidade . ' - ' . $this->uf;
        return $enderecoCompleto;
    }

    public function _getAnexos()
    {
        return (TableRegistry::getTableLocator()->get('CandidatosAnexos'))->find()->where(['candidatos_id = ' => $this->id]);
    }


    public function _getDataInscricao()
    {
        return $this->criado->modify('-3 hours');
        //date('d/m/Y H:i:s', strtotime('-3 hour', strtotime(date($candidato->criado->format('Y-m-d H:i:s')))))
    }
}
