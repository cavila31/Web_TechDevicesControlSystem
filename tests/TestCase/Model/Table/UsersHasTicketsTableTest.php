<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersHasTicketsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersHasTicketsTable Test Case
 */
class UsersHasTicketsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersHasTicketsTable
     */
    public $UsersHasTickets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users_has_tickets',
        'app.users',
        'app.tickets'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UsersHasTickets') ? [] : ['className' => 'App\Model\Table\UsersHasTicketsTable'];
        $this->UsersHasTickets = TableRegistry::get('UsersHasTickets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersHasTickets);

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
