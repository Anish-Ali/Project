<?php
namespace Products\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Products\Model\Table\CostumersTable;

/**
 * Products\Model\Table\CostumersTable Test Case
 */
class CostumersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Products\Model\Table\CostumersTable
     */
    public $Costumers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.Products.Costumers',
        'plugin.Products.Phinxlog',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Costumers') ? [] : ['className' => CostumersTable::class];
        $this->Costumers = TableRegistry::getTableLocator()->get('Costumers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Costumers);

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
}
