<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CandidatosAnexosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CandidatosAnexosTable Test Case
 */
class CandidatosAnexosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CandidatosAnexosTable
     */
    public $CandidatosAnexos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CandidatosAnexos',
        'app.Candidatos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CandidatosAnexos') ? [] : ['className' => CandidatosAnexosTable::class];
        $this->CandidatosAnexos = TableRegistry::getTableLocator()->get('CandidatosAnexos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CandidatosAnexos);

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
