<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form settings-form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id' => 'directory-form',
        'enableAjaxValidation' => false,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'htmlOptions' => array('enctype' => 'multipart/form-data')
    )); ?>

	<?php echo $form->errorSummary($model, null, null, array('class' => 'row alert alert-danger error-summary')); ?>

    <div class="row ">
        <div class="col-md-6">
            <?php echo $form->labelEx($model,'Title'); ?>
            <?php echo $form->textField($model,'Title',array('size' => 60,'maxlength' => 255)); ?>
            <?php echo $form->error($model,'Title'); ?>
        </div>

        <div class="col-md-6">
            <?php echo $form->labelEx($model,'Url'); ?>
            <?php echo $form->textField($model,'Url',array('size' => 60,'maxlength' => 255, 'placeholder' => 'http://')); ?>
            <?php echo $form->error($model,'Url'); ?>
        </div>
	</div>

    <div class="row">
         <div class="col-md-6">
            <?php echo $form->labelEx($model,'Logo'); ?>
            <?php echo $form->fileField($model, 'Logo', array('maxlength' => 255)); ?>
            <?php echo $form->error($model,'Logo'); ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->labelEx($model,'Path'); ?>
            <?php echo $form->textField($model,'Path',array('size' => 60,'maxlength' => 255)); ?>
            <?php echo $form->error($model,'Path'); ?>
        </div>
    </div>

    <div class="row ">
        <div class="col-md-12">
            <?php echo $form->labelEx($model,'Description'); ?>
            <?php
                $this->widget('ext.editMe.widgets.ExtEditMe', array(
                    'model' => $model,
                    'attribute' => 'Description',
                ));
            ?>
            <?php echo $form->error($model,'Description'); ?>
        </div>
	</div>

    <div class="row buttons">
        <div class="col-md-6">
            <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-warning')); ?>
        </div>
	</div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
    $(document).ready(function () {
        $('#DBBusinessExtra_Title').focusout(function ()
        {
            if ($('#DBBusinessExtra_Path').val() == '')
            {
                var pathUrl = $(this).val().toLowerCase().replace(/ /g, '-');
                $('#DBBusinessExtra_Path').val(pathUrl);
            }
        });
    });
</script>