<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Medico Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $matricula
 * @property string $crm
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $criado
 * @property \Cake\I18n\FrozenTime $alterado
 */
class Medico extends Entity
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
        'nome' => true,
        'matricula' => true,
        'crm' => true,
        'status' => true,
        'criado' => true,
        'alterado' => true
    ];
}
