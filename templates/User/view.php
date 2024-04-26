<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<?php
$this->assign('title', __('User'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List User'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($user->username) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Username') ?></th>
                <td><?= h($user->username) ?></td>
            </tr>
            <tr>
                <th><?= __('Email') ?></th>
                <td><?= h($user->email) ?></td>
            </tr>
            <tr>
                <th><?= __('Nama Lengkap') ?></th>
                <td><?= h($user->nama_lengkap) ?></td>
            </tr>
            <tr>
                <th><?= __('Alamat') ?></th>
                <td><?= h($user->alamat) ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($user->id) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="related related-album view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Album') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Album'), ['controller' => 'Album', 'action' => 'add', '?' => ['user_id' => $user->id]], ['class' => 'btn btn-primary btn-sm']) ?>
            <?= $this->Html->link(__('List Album'), ['controller' => 'Album', 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nama Album') ?></th>
                <th><?= __('Deskripsi') ?></th>
                <th><?= __('Tdl Dibuat') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($user->album)) : ?>
                <tr>
                    <td colspan="6" class="text-muted">
                        <?= __('Album record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($user->album as $album) : ?>
                    <tr>
                        <td><?= h($album->id) ?></td>
                        <td><?= h($album->nama_album) ?></td>
                        <td><?= h($album->deskripsi) ?></td>
                        <td><?= h($album->tdl_dibuat) ?></td>
                        <td><?= h($album->user_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Album', 'action' => 'view', $album->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Album', 'action' => 'edit', $album->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Album', 'action' => 'delete', $album->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $album->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</div>

<div class="related related-foto view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Foto') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Foto'), ['controller' => 'Foto', 'action' => 'add', '?' => ['user_id' => $user->id]], ['class' => 'btn btn-primary btn-sm']) ?>
            <?= $this->Html->link(__('List Foto'), ['controller' => 'Foto', 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Judul Foto') ?></th>
                <th><?= __('Deskripsi') ?></th>
                <th><?= __('Tgl Unggahan') ?></th>
                <th><?= __('Lokasi Foto') ?></th>
                <th><?= __('Album Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($user->foto)) : ?>
                <tr>
                    <td colspan="8" class="text-muted">
                        <?= __('Foto record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($user->foto as $foto) : ?>
                    <tr>
                        <td><?= h($foto->id) ?></td>
                        <td><?= h($foto->judul_foto) ?></td>
                        <td><?= h($foto->deskripsi) ?></td>
                        <td><?= h($foto->tgl_unggahan) ?></td>
                        <td><?= h($foto->lokasi_foto) ?></td>
                        <td><?= h($foto->album_id) ?></td>
                        <td><?= h($foto->user_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Foto', 'action' => 'view', $foto->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Foto', 'action' => 'edit', $foto->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Foto', 'action' => 'delete', $foto->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $foto->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</div>

<div class="related related-komentarfoto view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Komentarfoto') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Komentarfoto'), ['controller' => 'Komentarfoto', 'action' => 'add', '?' => ['user_id' => $user->id]], ['class' => 'btn btn-primary btn-sm']) ?>
            <?= $this->Html->link(__('List Komentarfoto'), ['controller' => 'Komentarfoto', 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Foto Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Isi Komentar') ?></th>
                <th><?= __('Tgl Komentar') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($user->komentarfoto)) : ?>
                <tr>
                    <td colspan="6" class="text-muted">
                        <?= __('Komentarfoto record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($user->komentarfoto as $komentarfoto) : ?>
                    <tr>
                        <td><?= h($komentarfoto->id) ?></td>
                        <td><?= h($komentarfoto->foto_id) ?></td>
                        <td><?= h($komentarfoto->user_id) ?></td>
                        <td><?= h($komentarfoto->isi_komentar) ?></td>
                        <td><?= h($komentarfoto->tgl_komentar) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Komentarfoto', 'action' => 'view', $komentarfoto->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Komentarfoto', 'action' => 'edit', $komentarfoto->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Komentarfoto', 'action' => 'delete', $komentarfoto->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $komentarfoto->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</div>

<div class="related related-likefoto view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Likefoto') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Likefoto'), ['controller' => 'Likefoto', 'action' => 'add', '?' => ['user_id' => $user->id]], ['class' => 'btn btn-primary btn-sm']) ?>
            <?= $this->Html->link(__('List Likefoto'), ['controller' => 'Likefoto', 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Foto Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Tgl Like') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($user->likefoto)) : ?>
                <tr>
                    <td colspan="5" class="text-muted">
                        <?= __('Likefoto record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($user->likefoto as $likefoto) : ?>
                    <tr>
                        <td><?= h($likefoto->id) ?></td>
                        <td><?= h($likefoto->foto_id) ?></td>
                        <td><?= h($likefoto->user_id) ?></td>
                        <td><?= h($likefoto->tgl_like) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Likefoto', 'action' => 'view', $likefoto->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Likefoto', 'action' => 'edit', $likefoto->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Likefoto', 'action' => 'delete', $likefoto->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $likefoto->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</div>
