<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LikefotoFixture
 */
class LikefotoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'likefoto';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'foto_id' => 1,
                'user_id' => 1,
                'tgl_like' => '2024-04-22 12:13:33',
            ],
        ];
        parent::init();
    }
}
