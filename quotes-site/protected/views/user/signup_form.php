<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id' => 'user-form',
	'enableAjaxValidation' => true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model, null, null, array('class' => 'row alert alert-danger error-summary')); ?>

    <div class="row">
		<?php echo $form->labelEx($model,'FirstName'); ?>
		<?php echo $form->textField($model,'FirstName',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'FirstName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LastName'); ?>
		<?php echo $form->textField($model,'LastName',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'LastName'); ?>
	</div>

    <?
    /*
    <div class="row">
		<?php echo $form->labelEx($model,'Username'); ?>
		<?php echo $form->textField($model,'Username',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Username'); ?>
	</div>
    */
    ?>

    <div class="row">
		<?php echo $form->labelEx($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Email'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'Email2'); ?>
		<?php echo $form->textField($model,'Email2',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Email2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Password'); ?>
		<?php echo $form->passwordField($model,'Password',
                array('class' => 'tooltip-i', 'size'=>32, 'maxlength'=>32,
                      'title' => 'Your password must be at least 6 characteres long and contain at least one uppercase letter or one number.')); ?>
		<?php echo $form->error($model,'Password'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'Password2'); ?>
		<?php echo $form->passwordField($model,'Password2',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'Password2'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Create Account', array('class' => 'btn btn-warning')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
    $(function() {
        $('.tooltip-i').tooltip();
    });
</script>