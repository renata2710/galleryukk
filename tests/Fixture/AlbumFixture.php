<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AlbumFixture
 */
class AlbumFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'album';
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
                'nama_album' => 'Lorem ipsum dolor sit amet',
                'deskripsi' => 'Lorem ipsum dolor sit amet',
                'tdl_dibuat' => '2024-04-22 12:13:01',
                'user_id' => 1,
            ],
        ];
        parent::init();
    }
}
