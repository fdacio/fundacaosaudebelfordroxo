<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CandidatosAnexo Entity
 *
 * @property int $id
 * @property int $candidatos_id
 * @property string $nome
 * @property string $arquivo
 *
 * @property \App\Model\Entity\Candidato $candidato
 */
class CandidatosAnexo extends Entity
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
        'nome' => true,
        'arquivo' => true,
        'candidato' => true
    ];
}
