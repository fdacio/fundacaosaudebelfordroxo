<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MatriculasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MatriculasTable Test Case
 */
class MatriculasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MatriculasTable
     */
    public $Matriculas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Matriculas',
        'app.Alunos',
        'app.Cursos',
        'app.Turnos',
        'app.Turmas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Matriculas') ? [] : ['className' => MatriculasTable::class];
        $this->Matriculas = TableRegistry::getTableLocator()->get('Matriculas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Matriculas);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
