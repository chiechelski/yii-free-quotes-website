<?php
/* @var $this DBCustomerEnquiryNoteController */
/* @var $model DBCustomerEnquiryNote */
/* @var $form CActiveForm */
?>

<div class="form searchform">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'customers-search-form',
    'action' => '/admin/customers',
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