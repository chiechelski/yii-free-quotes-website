<?php
/* @var $this LinkController */
/* @var $dataProvider CActiveDataProvider */

unset($this->breadcrumbs);
?>

<div class="row">
    <div class="col-md-12">
        <?php
            $this->widget('AdminMenuWidget');
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <a href="/admin/suppliers" class="btn btn-default"> Back to Supplier list </a>
        <? if (!empty($user->Id)) : ?>
            <a href="/admin/supplier/<?= $user->Id ?>" class="btn btn-info"> Edit Supplier </a>
            <a href="/admin/supplier/view/<?= $model->Id ?>" class="btn btn-info"> View Supplier </a>
        <? endif; ?>
    </div>
</div>

<div class="row">
    &nbsp;
</div>

<div class="row row-account">
    <div class="col-md-12">
        <h1>Directory Details - <?= $user->CompanyName ?></h1>

        <?php if(Yii::app()->user->hasFlash('directory')): ?>
            <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('directory'); ?>
            </div>
        <?php endif; ?>

        <?php echo $this->renderPartial('_form_directory', array('model' => $model)); ?>
    </div>
</div>
