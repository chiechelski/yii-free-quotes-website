<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form settings-form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        'enableAjaxValidation' => false,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    )); ?>

	<p class="note col-md-12">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model, null, null, array('class' => 'row alert alert-danger error-summary')); ?>

     <?
     /*
     if ($model->ApplicationType == "dd"): ?>
        <div class="row ">
            <div class="col-md-6">
                <?php echo $form->labelEx($model,'Username'); ?>
                <?php echo $form->textField($model,'Username',array('size'=>50,'maxlength'=>50)); ?>
                <?php echo $form->error($model,'Username'); ?>
            </div>
        </div>
    <? endif;
      */
    ?>

    <div class="row">
        <div class="col-md-6">
            <?php echo $form->labelEx($model, 'FirstName'); ?>
            <?php echo $form->textField($model, 'FirstName', array('size'=>50,'maxlength'=>50)); ?>
            <?php echo $form->error($model, 'FirstName'); ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->labelEx($model, 'LastName'); ?>
            <?php echo $form->textField($model, 'LastName', array('size'=>60,'maxlength'=>100)); ?>
            <?php echo $form->error($model, 'LastName'); ?>
        </div>
	</div>

    <div class="row">
        <div class="col-md-6">
            <?php echo $form->labelEx($model, 'Email'); ?>
            <?php echo $form->textField($model, 'Email', array('size'=>60,'maxlength'=>100)); ?>
            <?php echo $form->error($model, 'Email'); ?>
        </div>
	</div>

    <div class="row ">
         <hr>
    </div>

    <div class="row ">
        <div class="col-md-6">
            <?php echo $form->labelEx($model,'Password'); ?>
            <?php echo $form->passwordField($model,'Password',
                array('class' => 'tooltip-i', 'size'=>32, 'maxlength'=>32,
                      'title' => 'Your password must be at least 6 characteres long and contain at least one uppercase letter or one number.')); ?>
            <?php echo $form->error($model,'Password'); ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->labelEx($model,'Password2'); ?>
            <?php echo $form->passwordField($model,'Password2',array('size'=>32,'maxlength'=>32)); ?>
            <?php echo $form->error($model,'Password2'); ?>
        </div>
	</div>

    <div class="row ">
         <hr>
    </div>

    <?php /*
    <div class="row">
        <div class="col-md-6">
            <?php echo $form->labelEx($model, 'Address'); ?>
            <?php echo $form->textField($model, 'Address1', array('size'=>60,'maxlength'=>100)); ?>
            <?php echo $form->error($model, 'Address1'); ?>
        </div>
	</div>

    <div class="row">
        <div class="col-md-6">
            <?php echo $form->labelEx($model, 'City'); ?>
            <?php echo $form->textField($model, 'City', array('size'=>60,'maxlength'=>100)); ?>
            <?php echo $form->error($model, 'City'); ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->labelEx($model, 'PostCode'); ?>
            <?php echo $form->textField($model, 'PostCode', array('size'=>60,'maxlength'=>100)); ?>
            <?php echo $form->error($model, 'PostCode'); ?>
        </div>
	</div>

    <div class="row">
        <div class="col-md-6">
            <?php echo $form->labelEx($model, 'Phone'); ?>
            <?php echo $form->textField($model, 'Phone', array('size'=>60,'maxlength'=>100)); ?>
            <?php echo $form->error($model, 'Phone'); ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->labelEx($model, 'Mobile'); ?>
            <?php echo $form->textField($model, 'Mobile', array('size'=>60,'maxlength'=>100)); ?>
            <?php echo $form->error($model, 'Mobile'); ?>
        </div>
	</div>

     */ ?>

    <div class="row buttons">
        <div class="col-md-6">
            <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-warning')); ?>
        </div>
	</div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
    $(function() {
        $('.tooltip-i').tooltip();
    });
</script>