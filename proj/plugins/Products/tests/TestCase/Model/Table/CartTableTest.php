<?php
namespace Products\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Products\Model\Table\CartTable;

/**
 * Products\Model\Table\CartTable Test Case
 */
class CartTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Products\Model\Table\CartTable
     */
    public $Cart;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.Products.Cart',
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
        $config = TableRegistry::getTableLocator()->exists('Cart') ? [] : ['className' => CartTable::class];
        $this->Cart = TableRegistry::getTableLocator()->get('Cart', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cart);

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
