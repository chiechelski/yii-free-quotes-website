<?php
/* @var $this CountryController */
/* @var $model Country */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id'); ?>
		<?php echo $form->textField($model,'Id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Currency'); ?>
		<?php echo $form->textField($model,'Currency',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Timezone'); ?>
		<?php echo $form->textField($model,'Timezone',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Created'); ?>
		<?php echo $form->textField($model,'Created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Modified'); ?>
		<?php echo $form->textField($model,'Modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Active'); ?>
		<?php echo $form->textField($model,'Active',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->