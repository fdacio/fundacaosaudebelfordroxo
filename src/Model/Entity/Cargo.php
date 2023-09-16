<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Cargo Entity
 *
 * @property int $id
 * @property string $nome
 */
class Cargo extends Entity
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
        'processos_id' => true,
        'nome' => true,
        'ativo' => true,
    ];

    public function _getProcesso()
    {
        return (TableRegistry::getTableLocator()->get('Processos'))->get($this->processos_id);
    }
}
