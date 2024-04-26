<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Likefoto $likefoto
 */
?>

<?php
$this->assign('title', __('Add Likefoto'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Likefoto'), 'url' => ['action' => 'index']],
    ['title' => __('Add')],
]);
?>

<div class="card card-primary card-outline">
    <?= $this->Form->create($likefoto, ['valueSources' => ['query', 'context']]) ?>
    <div class="card-body">
        <?= $this->Form->control('foto_id', ['options' => $foto, 'class' => 'form-control']) ?>
        <?= $this->Form->control('user_id', ['options' => $user, 'class' => 'form-control']) ?>
        <?= $this->Form->control('tgl_like') ?>
    </div>
    <div class="card-footer d-flex">
        <div class="ml-auto">
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>