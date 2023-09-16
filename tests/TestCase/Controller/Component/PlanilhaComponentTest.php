<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\PlanilhaComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\PlanilhaComponent Test Case
 */
class PlanilhaComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\PlanilhaComponent
     */
    public $Planilha;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Planilha = new PlanilhaComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Planilha);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
