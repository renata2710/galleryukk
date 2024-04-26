<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Komentarfoto[]|\Cake\Collection\CollectionInterface $komentarfoto
 */
?>

<?php
$this->assign('title', __('Komentarfoto'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Komentarfoto')],
]);
?>

<div class="card card-primary card-outline">
    <div class="card-header d-flex flex-column flex-md-row">
        <h2 class="card-title">
            <!-- -->
        </h2>
        <div class="d-flex ml-auto">
            <?= $this->Paginator->limitControl([], null, [
                'label' => false,
                'class' => 'form-control form-control-sm',
                'templates' => ['inputContainer' => '{{content}}']
            ]); ?>
            <?= $this->Html->link(__('New Komentarfoto'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm ml-2']) ?>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('foto_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('isi_komentar') ?></th>
                    <th><?= $this->Paginator->sort('tgl_komentar') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($komentarfoto as $komentarfoto) : ?>
                    <tr>
                        <td><?= $this->Number->format($komentarfoto->id) ?></td>
                        <td><?= $komentarfoto->has('foto') ? $this->Html->link($komentarfoto->foto->judul_foto, ['controller' => 'Foto', 'action' => 'view', $komentarfoto->foto->id]) : '' ?></td>
                        <td><?= $komentarfoto->has('user') ? $this->Html->link($komentarfoto->user->username, ['controller' => 'User', 'action' => 'view', $komentarfoto->user->id]) : '' ?></td>
                        <td><?= h($komentarfoto->isi_komentar) ?></td>
                        <td><?= h($komentarfoto->tgl_komentar) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $komentarfoto->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $komentarfoto->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $komentarfoto->id], ['class' => 'btn btn-xs btn-outline-danger', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $komentarfoto->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer d-flex flex-column flex-md-row">
        <div class="text-muted">
            <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
        </div>
        <ul class="pagination pagination-sm mb-0 ml-auto">
            <?= $this->Paginator->first('<i class="fas fa-angle-double-left"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->prev('<i class="fas fa-angle-left"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('<i class="fas fa-angle-right"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->last('<i class="fas fa-angle-double-right"></i>', ['escape' => false]) ?>
        </ul>
    </div>
    <!-- /.card-footer -->
</div>