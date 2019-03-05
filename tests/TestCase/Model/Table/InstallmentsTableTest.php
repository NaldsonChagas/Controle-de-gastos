<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InstallmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InstallmentsTable Test Case
 */
class InstallmentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InstallmentsTable
     */
    public $Installments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Installments',
        'app.Purchases',
        'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Installments') ? [] : ['className' => InstallmentsTable::class];
        $this->Installments = TableRegistry::getTableLocator()->get('Installments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Installments);

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
