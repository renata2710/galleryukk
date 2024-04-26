<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Foto Entity
 *
 * @property int $id
 * @property string $judul_foto
 * @property string $deskripsi
 * @property \Cake\I18n\DateTime $tgl_unggahan
 * @property string $lokasi_foto
 * @property int $album_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Album $album
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Komentarfoto[] $komentarfoto
 * @property \App\Model\Entity\Likefoto[] $likefoto
 */
class Foto extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'judul_foto' => true,
        'deskripsi' => true,
        'tgl_unggahan' => true,
        'lokasi_foto' => true,
        'album_id' => true,
        'user_id' => true,
        'album' => true,
        'user' => true,
        'komentarfoto' => true,
        'likefoto' => true,
    ];
}
