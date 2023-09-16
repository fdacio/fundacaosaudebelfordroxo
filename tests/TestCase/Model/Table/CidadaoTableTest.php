<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CidadaoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CidadaoTable Test Case
 */
class CidadaoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CidadaoTable
     */
    public $Cidadao;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Cidadao',
        'app.Acao'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Cidadao') ? [] : ['className' => CidadaoTable::class];
        $this->Cidadao = TableRegistry::getTableLocator()->get('Cidadao', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cidadao);

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
