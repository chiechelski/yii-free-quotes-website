<?php
/* @var $this UserController */
/* @var $model User */
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
		<?php echo $form->label($model,'Username'); ?>
		<?php echo $form->textField($model,'Username',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Password'); ?>
		<?php echo $form->passwordField($model,'Password',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FirstName'); ?>
		<?php echo $form->textField($model,'FirstName',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LastName'); ?>
		<?php echo $form->textField($model,'LastName',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UserType'); ?>
		<?php echo $form->textField($model,'UserType',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CompanyName'); ?>
		<?php echo $form->textField($model,'CompanyName',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Address1'); ?>
		<?php echo $form->textField($model,'Address1',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Address2'); ?>
		<?php echo $form->textField($model,'Address2',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'City'); ?>
		<?php echo $form->textField($model,'City',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'State'); ?>
		<?php echo $form->textField($model,'State',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PostCode'); ?>
		<?php echo $form->textField($model,'PostCode',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Country'); ?>
		<?php echo $form->textField($model,'Country',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Phone'); ?>
		<?php echo $form->textField($model,'Phone',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PaymentType'); ?>
		<?php echo $form->textField($model,'PaymentType',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PaymentAccount'); ?>
		<?php echo $form->textField($model,'PaymentAccount',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'GoogleAnalytics'); ?>
		<?php echo $form->textField($model,'GoogleAnalytics',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Lang'); ?>
		<?php echo $form->textField($model,'Lang',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UserVerification'); ?>
		<?php echo $form->textField($model,'UserVerification',array('size'=>32,'maxlength'=>32)); ?>
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

	<div class="row">
		<?php echo $form->label($model,'Validated'); ?>
		<?php echo $form->textField($model,'Validated'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->