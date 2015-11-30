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
        <h1>Supplier View - <?= $model->CompanyName ?></h1>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <a href="/admin/suppliers" class="btn btn-default"> Back to Supplier list </a>
        <? if (!empty($model->Id)) : ?>
            <a href="/admin/supplier/<?= $model->Id ?>" class="btn btn-info"> Edit Supplier </a>
            <a href="/admin/supplier/directory/<?= $model->Id ?>" class="btn btn-info"> Edit Directory </a>
        <? endif; ?>
    </div>
</div>

<div class="row">
    &nbsp;
</div>

<div class="view-enquiry">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <h1>Linked Quotes</h1>
                </div>
                <div class="col-md-12">
                    <?php
                        $this->widget('EnquiryQuotesWidget', array('supplier' => $model));
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h1>Select your Categories</h1>
            <?php if(Yii::app()->user->hasFlash('categories')): ?>
                <div class="alert alert-success">
                    <?php echo Yii::app()->user->getFlash('categories'); ?>
                </div>
            <?php endif; ?>

            <?php echo $this->renderPartial('_form_categories', array(
                'model' => $model,
                'categories' => $categories,
                'subCategories' => $subCategories,
                'selectedSubCategories' => $selectedSubCategories)); ?>
        </div>
    </div>
</div>
