<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KomentarfotoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KomentarfotoTable Test Case
 */
class KomentarfotoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\KomentarfotoTable
     */
    protected $Komentarfoto;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Komentarfoto',
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
        $config = $this->getTableLocator()->exists('Komentarfoto') ? [] : ['className' => KomentarfotoTable::class];
        $this->Komentarfoto = $this->getTableLocator()->get('Komentarfoto', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Komentarfoto);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\KomentarfotoTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\KomentarfotoTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
