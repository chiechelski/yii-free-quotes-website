<?php
/* @var $this DBCustomerEnquiryController */
/* @var $model DBCustomerEnquiry */
/* @var $form CActiveForm */

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
        <a href="/admin/enquiries" class="btn btn-default"> Back to Enquiries list </a>
        <? if (!empty($model->Id)) : ?>
            <a href="/admin/enquiry/view/<?= $model->Id ?>" class="btn btn-info"> View Enquiry Page </a>
        <? endif; ?>
    </div>
</div>

<div class="row">
    &nbsp;
</div>

<div class="row">
     <div class="col-md-12">
        <h1><?= empty($model->Id) ?'Add Enquiry':'Edit Enquiry'?></h1>

        <?php if(Yii::app()->user->hasFlash('enquiry')): ?>
            <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('enquiry'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="col-md-12">
        <?php echo $this->renderPartial('_form_enquiry', array(
            'model' => $model,
            'user' => $user));
        ?>
    </div>
</div>
