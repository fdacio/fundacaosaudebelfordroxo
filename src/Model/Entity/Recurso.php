<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Recurso Entity
 *
 * @property int $id
 * @property int $candidatos_id
 * @property \Cake\I18n\FrozenTime $data
 * @property string $questionamento
 * @property string $embasamento_legal
 *
 * @property \App\Model\Entity\Candidato $candidato
 */
class Recurso extends Entity
{
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
        'candidatos_id' => true,
        'data' => true,
        'questionamento' => true,
        'embasamento_legal' => true,
        'candidato' => true,
        'situacao' => true,
        'data_analise' => true,
        'usuarios_id' => true,
        'justificativa' => true
    ];

    const SITUACOES = [
        0 => 'Em análise',
        1 => 'Recurso DEFERIDO',
        2 => 'Recurso INDEFERIDO'
    ];

    public function _getSituacaoTexto()
    {
        return self::SITUACOES[$this->situacao];
    }

    public function _getCandidato()
    {
        return (TableRegistry::getTableLocator()->get('Candidatos'))->get($this->candidatos_id);
    }
}
