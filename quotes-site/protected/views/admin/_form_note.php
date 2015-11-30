<?php
/* @var $this DBCustomerEnquiryNoteController */
/* @var $model DBCustomerEnquiryNote */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dbcustomer-enquiry-note-_form_note-form',
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
		<?php echo $form->labelEx($model,'User'); ?>
		<?php echo $form->textField($model,'User'); ?>
		<?php echo $form->error($model,'User'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Note'); ?>
		<?php echo $form->textField($model,'Note'); ?>
		<?php echo $form->error($model,'Note'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->