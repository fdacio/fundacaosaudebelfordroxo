<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AcaoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AcaoTable Test Case
 */
class AcaoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AcaoTable
     */
    public $Acao;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Acao',
        'app.Cidadao'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Acao') ? [] : ['className' => AcaoTable::class];
        $this->Acao = TableRegistry::getTableLocator()->get('Acao', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Acao);

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
