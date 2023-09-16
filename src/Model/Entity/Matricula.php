<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Matricula Entity
 *
 * @property int $id
 * @property int $alunos_id
 * @property int $cursos_id
 * @property int $turnos_id
 * @property int $turmas_id
 * @property \Cake\I18n\FrozenDate $data
 * @property \Cake\I18n\FrozenTime $hora_ini
 * @property \Cake\I18n\FrozenTime $hora_fim
 * @property int $usuarios_1
 * @property int $usuarios_2
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $criado
 * @property \Cake\I18n\FrozenTime $alterado
 *
 * @property \App\Model\Entity\Aluno $aluno
 * @property \App\Model\Entity\Curso $curso
 * @property \App\Model\Entity\Turno $turno
 * @property \App\Model\Entity\Turma $turma
 */
class Matricula extends Entity
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
        'alunos_id' => true,
        'cursos_id' => true,
        'turnos_id' => true,
        'turmas_id' => true,
        'data' => true,
        'hora_ini' => true,
        'hora_fim' => true,
        'termo' => true,
        'usuarios_1' => true,
        'usuarios_2' => true,
        'status' => true,
        'criado' => true,
        'alterado' => true,
        'aluno' => true,
        'curso' => true,
        'turno' => true,
        'turma' => true
    ];
    
    public function _getAluno()
    {
        return (TableRegistry::getTableLocator()->get('Alunos'))->get($this->alunos_id);
    }

    public function _getCurso()
    {
        return (TableRegistry::getTableLocator()->get('Cursos'))->get($this->cursos_id);
    }
    
    public function _getTurma()
    {
        return (TableRegistry::getTableLocator()->get('Turmas'))->get($this->turmas_id);
    }
    
    public function _getTurno()
    {
        return (TableRegistry::getTableLocator()->get('Turnos'))->get($this->turnos_id);
    }
    
    public function _getUsuario()
    {
        return (TableRegistry::getTableLocator()->get('Usuarios'))->get($this->usuarios_1);
    }
    
    public function _getUsuario2()
    {
        return (TableRegistry::getTableLocator()->get('Usuarios'))->get($this->usuarios_2);
    }
}
