<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id' => 'user-form',
	'enableAjaxValidation' => false,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model, null, null, array('class' => 'row alert alert-danger error-summary')); ?>

    <div class="row">
		<?php echo $form->labelEx($model,'CompanyName'); ?>
		<?php echo $form->textField($model,'CompanyName',array('size'=>50,'maxlength'=>50, 'placeholder' => 'Business or organisation name')); ?>
		<?php echo $form->error($model,'CompanyName'); ?>
	</div>

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

    <div class="row">
        <?php echo $form->labelEx($model,'PlanType'); ?>
        <?php echo $form->dropDownList($model,'PlanType',
            array('free' => 'Free', 'medium' => 'Medium', 'premium' => 'Premium'),
            array('options' => array((!empty($type)? $type : 'free') => array('selected' => true)))); ?>
        <a data-toggle="modal" href="/business/packagetypes" data-target="#myModal"> * find out more about our plans prices</a>
    </div>

    <div class="row row-tac">
		<?php echo $form->checkBox($model,'TermsAndConditions'); ?>
        <label for="User_TermsAndConditions">I have read and accept D&D's</label>
        <a data-toggle="modal" href="/user/termsandconditions/" data-target="#myModal">terms and conditions</a>
		<?php echo $form->error($model,'TermsAndConditions'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Create Account', array('class' => 'btn btn-warning')); ?>
	</div>

    <?php echo $form->hiddenField($model,'UserType',array('value' => User::$rolesSignup['supplier'])); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
    $(function() {
        $('.tooltip-i').tooltip();
    });
</script>