<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        'enableAjaxValidation' => false,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    )); ?>

	<?php echo $form->errorSummary($model, null, null, array('class' => 'row alert alert-danger error-summary')); ?>

    <div class="row">
		<?php echo $form->labelEx($model, 'CompanyName'); ?>
		<?php echo $form->textField($model, 'CompanyName', array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model, 'CompanyName'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model, 'Address1'); ?>
		<?php echo $form->textField($model, 'Address1', array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model, 'Address1'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model, 'PostCode'); ?>
		<?php echo $form->textField($model, 'PostCode', array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model, 'PostCode'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model, 'City'); ?>
		<?php echo $form->textField($model, 'City', array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model, 'City'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model, 'Phone'); ?>
		<?php echo $form->textField($model, 'Phone', array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model, 'Phone'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model, 'Mobile'); ?>
		<?php echo $form->textField($model, 'Mobile', array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model, 'Mobile'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Save', array('class' => 'btn btn-warning', 'name' => 'Details' )); ?>
	</div>

    <?php $this->endWidget(); ?>

</div><!-- form -->