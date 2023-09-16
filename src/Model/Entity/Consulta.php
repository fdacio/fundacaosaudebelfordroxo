<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Consulta Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $data
 * @property int $pacientes_id
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $criado
 * @property \Cake\I18n\FrozenTime $alterado
 *
 * @property \App\Model\Entity\Paciente $paciente
 */
class Consulta extends Entity
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
        'data' => true,
        'pacientes_id' => true,
        'status' => true,
        'criado' => true,
        'alterado' => true,
        'paciente' => true
    ];
}
