<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MatriculasFixture
 */
class MatriculasFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'alunos_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cursos_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'turnos_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'turmas_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'data' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'hora_ini' => ['type' => 'time', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'hora_fim' => ['type' => 'time', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'usuarios_1' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'usuarios_2' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'status' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        'criado' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'alterado' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_matriculas_alunos' => ['type' => 'index', 'columns' => ['alunos_id'], 'length' => []],
            'fk_matriculas_cursos' => ['type' => 'index', 'columns' => ['cursos_id'], 'length' => []],
            'fk_matriculas_turmas' => ['type' => 'index', 'columns' => ['turmas_id'], 'length' => []],
            'fk_matriculas_turnos' => ['type' => 'index', 'columns' => ['turnos_id'], 'length' => []],
            'fk_matriculas_usuarios1' => ['type' => 'index', 'columns' => ['usuarios_1'], 'length' => []],
            'fk_matriculas_usuarios2' => ['type' => 'index', 'columns' => ['usuarios_2'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_matriculas_alunos' => ['type' => 'foreign', 'columns' => ['alunos_id'], 'references' => ['alunos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_matriculas_cursos' => ['type' => 'foreign', 'columns' => ['cursos_id'], 'references' => ['cursos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_matriculas_turmas' => ['type' => 'foreign', 'columns' => ['turmas_id'], 'references' => ['turmas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_matriculas_turnos' => ['type' => 'foreign', 'columns' => ['turnos_id'], 'references' => ['turnos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_matriculas_usuarios1' => ['type' => 'foreign', 'columns' => ['usuarios_1'], 'references' => ['usuarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_matriculas_usuarios2' => ['type' => 'foreign', 'columns' => ['usuarios_2'], 'references' => ['usuarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'alunos_id' => 1,
                'cursos_id' => 1,
                'turnos_id' => 1,
                'turmas_id' => 1,
                'data' => '2019-12-29',
                'hora_ini' => '13:50:21',
                'hora_fim' => '13:50:21',
                'usuarios_1' => 1,
                'usuarios_2' => 1,
                'status' => 1,
                'criado' => '2019-12-29 13:50:21',
                'alterado' => '2019-12-29 13:50:21'
            ],
        ];
        parent::init();
    }
}
