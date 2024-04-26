<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Komentarfoto $komentarfoto
 */
?>

<?php
$this->assign('title', __('Komentarfoto'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Komentarfoto'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($komentarfoto->isi_komentar) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Foto') ?></th>
                <td><?= $komentarfoto->has('foto') ? $this->Html->link($komentarfoto->foto->judul_foto, ['controller' => 'Foto', 'action' => 'view', $komentarfoto->foto->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('User') ?></th>
                <td><?= $komentarfoto->has('user') ? $this->Html->link($komentarfoto->user->username, ['controller' => 'User', 'action' => 'view', $komentarfoto->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Isi Komentar') ?></th>
                <td><?= h($komentarfoto->isi_komentar) ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($komentarfoto->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Tgl Komentar') ?></th>
                <td><?= h($komentarfoto->tgl_komentar) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $komentarfoto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $komentarfoto->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $komentarfoto->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>
