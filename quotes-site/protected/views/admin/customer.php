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
        <a href="/admin/customers" class="btn btn-default"> Back to Customer list </a>
    </div>
</div>

<div class="row">
    &nbsp;
</div>

<div class="row">
     <div class="col-md-12">
        <h1><?= empty($model->Id) ?'Add Customer':'Edit Customer'?></h1>

        <?php if(Yii::app()->user->hasFlash('customer')): ?>
            <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('customer'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="col-md-12">
        <?php echo $this->renderPartial('_form_supplier', array(
            'userType' => 'customer',
            'model' => $model));
        ?>
    </div>
</div>
