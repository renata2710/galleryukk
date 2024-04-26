<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Likefoto $likefoto
 */
?>

<?php
$this->assign('title', __('Likefoto'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Likefoto'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($likefoto->id) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Foto') ?></th>
                <td><?= $likefoto->has('foto') ? $this->Html->link($likefoto->foto->judul_foto, ['controller' => 'Foto', 'action' => 'view', $likefoto->foto->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('User') ?></th>
                <td><?= $likefoto->has('user') ? $this->Html->link($likefoto->user->username, ['controller' => 'User', 'action' => 'view', $likefoto->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($likefoto->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Tgl Like') ?></th>
                <td><?= h($likefoto->tgl_like) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $likefoto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $likefoto->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $likefoto->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>
