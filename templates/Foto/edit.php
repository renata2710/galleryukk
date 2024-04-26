<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Foto $foto
 */

use Authentication\Identity;
use Cake\I18n\FrozenTime;
$time = FrozenTime::now();
?>

<?php
$this->assign('title', __('Edit Foto'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Foto'), 'url' => ['action' => 'index']],
    ['title' => __('View'), 'url' => ['action' => 'view', $foto->id]],
    ['title' => __('Edit')],
]);
?>

<div class="card card-primary card-outline">
    <?= $this->Form->create($foto, ['type' => 'file']) ?>
    <div class="card-body">
        <?= $this->Form->control('judul_foto') ?>
        <?= $this->Form->control('deskripsi') ?>
        <?= $this->Form->control('tgl_unggahan', ['value' => $time->i18nFormat('yyyy-MM-dd HH:mm:ss')]) ?>
        <?= $this->Form->control('img', ['type' => 'file']) ?>
        <?= $this->Form->control('album_id', ['options' => $album, 'class' => 'form-control']) ?>
        <?= $this->Form->control('user_id', ['value' => $this->Identity->get('id'), 'type' => 'hidden' ,'options' => $user, 'class' => 'form-control']) ?>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $foto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $foto->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'view', $foto->id], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>