<?php
/* @var $this DBCategoryController */
/* @var $model DBCategory */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dbcategory-form-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name'); ?>
		<?php echo $form->error($model,'Name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Url'); ?>
		<?php echo $form->textField($model,'Url'); ?>
		<?php echo $form->error($model,'Url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Parent'); ?>
		<?php echo $form->textField($model,'Parent'); ?>
		<?php echo $form->error($model,'Parent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Active'); ?>
		<?php echo $form->textField($model,'Active'); ?>
		<?php echo $form->error($model,'Active'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->