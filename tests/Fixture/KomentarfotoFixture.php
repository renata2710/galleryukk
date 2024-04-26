<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * KomentarfotoFixture
 */
class KomentarfotoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'komentarfoto';
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
                'isi_komentar' => 'Lorem ipsum dolor sit amet',
                'tgl_komentar' => '2024-04-22 12:13:25',
            ],
        ];
        parent::init();
    }
}
