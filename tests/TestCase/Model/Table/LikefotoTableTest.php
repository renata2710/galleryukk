<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LikefotoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LikefotoTable Test Case
 */
class LikefotoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LikefotoTable
     */
    protected $Likefoto;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Likefoto',
        'app.Foto',
        'app.User',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Likefoto') ? [] : ['className' => LikefotoTable::class];
        $this->Likefoto = $this->getTableLocator()->get('Likefoto', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Likefoto);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LikefotoTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\LikefotoTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
