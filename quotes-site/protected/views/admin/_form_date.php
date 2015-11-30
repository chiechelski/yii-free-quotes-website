<?php
/* @var $this DBCustomerEnquiryDateController */
/* @var $model DBCustomerEnquiryDate */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dbcustomer-enquiry-date-_form_date-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Enquiry'); ?>
		<?php echo $form->textField($model,'Enquiry'); ?>
		<?php echo $form->error($model,'Enquiry'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'From'); ?>
		<?php echo $form->textField($model,'From'); ?>
		<?php echo $form->error($model,'From'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'To'); ?>
		<?php echo $form->textField($model,'To'); ?>
		<?php echo $form->error($model,'To'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->