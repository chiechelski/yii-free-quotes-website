<?php
/* @var $this DBBusinessQuoteController */
/* @var $model DBBusinessQuote */
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
        <a href="/admin/enquiry/view/<?= $enquiry->Id ?>" class="btn btn-default"> Back to Enquiry view </a>
    </div>
</div>

<div class="row">
    &nbsp;
</div>

<div class="row">
     <div class="col-md-12">
        <h1><?= empty($model->Id) ?'Add Quote':'Edit Quote'?> (<?= $model->getRefNum(); ?>)</h1>

        <?php if(Yii::app()->user->hasFlash('quote')): ?>
            <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('quote'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="col-md-12">
        <?php echo $this->renderPartial('_form_quote', array(
            'user' => $user,
            'model' => $model));
        ?>
    </div>
</div>
