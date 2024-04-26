<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Foto[]|\Cake\Collection\CollectionInterface $foto
 */
?>

<?php
$this->assign('title', __('Foto'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Foto')],
]);
?>

<div class="card card-primary card-outline">
    <div class="card-header d-flex flex-column flex-md-row">
        <h2 class="card-title">
            Foto Gallery
        </h2>
        <div class="d-flex ml-auto">
            <?= $this->Paginator->limitControl([], null, [
                'label' => false,
                'class' => 'form-control form-control-sm',
                'templates' => ['inputContainer' => '{{content}}']
            ]); ?>
            <?= $this->Html->link(__('New Foto'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm ml-2']) ?>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <div class="row">
            <?php foreach ($foto as $foto) : ?>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card h-100">
                        <img src="<?= $this->Url->image('img/' . $foto->lokasi_foto) ?>" class="card-img-top" alt="<?= h($foto->judul_foto) ?>" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?= h($foto->judul_foto) ?></h5>
                            <p class="card-text"><?= h($foto->deskripsi) ?></p>
                            <p class="card-text"><small class="text-muted"><?= date('d F Y H:i:s', strtotime($foto->tgl_unggahan)) ?></small></p>
                        </div>
                        <div class="card-footer">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $foto->id], ['class' => 'btn btn-primary btn-sm']) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $foto->id], ['class' => 'btn btn-secondary btn-sm']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $foto->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Are you sure you want to delete # {0}?', $foto->id)]) ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
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
