<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FotoFixture
 */
class FotoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'foto';
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
                'judul_foto' => 'Lorem ipsum dolor sit amet',
                'deskripsi' => 'Lorem ipsum dolor sit amet',
                'tgl_unggahan' => '2024-04-22 12:13:09',
                'lokasi_foto' => 'Lorem ipsum dolor sit amet',
                'album_id' => 1,
                'user_id' => 1,
            ],
        ];
        parent::init();
    }
}
