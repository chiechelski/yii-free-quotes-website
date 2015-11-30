<?php
/* @var $this DBCustomerEnquiryNoteController */
/* @var $model DBCustomerEnquiryNote */
/* @var $form CActiveForm */
?>

<div class="form searchform">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'suppliers-search-form',
    'action' => '/admin/suppliers',
	'enableAjaxValidation' => false,
)); ?>
	<div class="row">
        <div class="col-md-2 col-sm-2">
            <?php echo $form->labelEx($model,'Name'); ?>
            <?php echo $form->textField($model,'Name'); ?>
        </div>
        <div class="col-md-2 col-sm-2">
            <?php echo $form->labelEx($model,'Email'); ?>
            <?php echo $form->textField($model,'Email'); ?>
        </div>
        <div class="col-md-2 col-sm-2">
            <?php echo $form->labelEx($model,'Category'); ?>
            <?php echo $form->dropDownList($model, 'Category', CHtml::listData($subCategories, 'Id', 'Name'), array(
                'prompt' => '-- Select a category --'
            )); ?>
        </div>
        <div class="col-md-1 col-sm-1">
            <?php echo $form->labelEx($model,'PlanType'); ?>
            <?php echo $form->dropDownList($model, 'PlanType', array('free' => 'free', 'medium' => 'medium', 'premium' => 'premium'), array(
                'prompt' => '-- All --'
            )); ?>
        </div>
        <div class="col-md-1 col-sm-1">
            <?php echo $form->labelEx($model,'ShowOnDirectory'); ?>
            <?php echo $form->dropDownList($model, 'ShowOnDirectory', array('Yes' => 'Yes', 'No' => 'No'), array(
                'prompt' => '-- All --'
            )); ?>
        </div>
        <div class="col-md-1 col-sm-1">
            <?php echo $form->labelEx($model,'Active'); ?>
            <?php echo $form->dropDownList($model, 'Active', array('Yes' => 'Yes', 'No' => 'No'), array(
                'prompt' => '-- All --'
            )); ?>
        </div>
         <div class="col-md-2 col-sm-2">
            <?php echo CHtml::submitButton('Search', array('id' => 'search')); ?>
        </div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->