<?php
/* @var $this AdminController */

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
        <? if (!empty($model->Id)) : ?>
            <a href="/admin/supplier/view/<?= $model->Id ?>" class="btn btn-info"> View Supplier </a>
            <a href="/admin/supplier/directory/<?= $model->Id ?>" class="btn btn-info"> Edit Directory </a>
        <? endif; ?>
    </div>
</div>

<div class="row">
    &nbsp;
</div>

<div class="row">
     <div class="col-md-12">
        <h1><?= empty($model->Id) ?'Add Supplier':'Edit Supplier - ' . $model->CompanyName  ?></h1>

        <?php if(Yii::app()->user->hasFlash('supplier')): ?>
            <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('supplier'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="col-md-12">
        <?php echo $this->renderPartial('_form_supplier', array(
            'model' => $model));
        ?>
    </div>
</div>
