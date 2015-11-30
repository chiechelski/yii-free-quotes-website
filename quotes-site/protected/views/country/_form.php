<?php
/* @var $this CountryController */
/* @var $model Country */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'country-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Currency'); ?>
		<?php echo $form->textField($model,'Currency',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'Currency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Timezone'); ?>
		<?php echo $form->textField($model,'Timezone',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Timezone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Created'); ?>
		<?php echo $form->textField($model,'Created'); ?>
		<?php echo $form->error($model,'Created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Modified'); ?>
		<?php echo $form->textField($model,'Modified'); ?>
		<?php echo $form->error($model,'Modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Active'); ?>
		<?php echo $form->textField($model,'Active',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'Active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->