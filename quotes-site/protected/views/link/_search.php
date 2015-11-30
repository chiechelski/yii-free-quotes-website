<?php
/* @var $this LinkController */
/* @var $model Link */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Hash'); ?>
		<?php echo $form->textField($model,'Hash',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'OrigUrl'); ?>
		<?php echo $form->textField($model,'OrigUrl',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UrlBase'); ?>
		<?php echo $form->textField($model,'UrlBase'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'User'); ?>
		<?php echo $form->textField($model,'User',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Created'); ?>
		<?php echo $form->textField($model,'Created'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->