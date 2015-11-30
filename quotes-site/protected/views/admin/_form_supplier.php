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

	<?php echo $form->errorSummary($model, null, null, array('class' => 'row alert alert-danger error-summary')); ?>

    <div class="row">
        <div class="col-md-6">
            <?php echo $form->labelEx($model, 'Username'); ?>
            <?php echo $form->textField($model, 'Username', array('size'=>60,'maxlength'=>100)); ?>
            <?php echo $form->error($model, 'Username'); ?>
        </div>
    </div>

    <? if (empty($model->Id)) : ?>
        <div class="row row-random-pwd">
            <div class="col-md-6">
                <?php echo $form->labelEx($model, 'RandomPassword'); ?>
                <?php echo $form->checkBox($model, 'RandomPassword', array('checked' => (@$_POST['User']['RandomPassword'] ?'checked': '') )); ?>
                <?php echo $form->error($model, 'RandomPassword'); ?>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#User_RandomPassword').change(function() {
                    if ($(this).is(':checked'))
                    {
                        $('.row-password').slideUp();
                    }
                    else
                    {
                        $('.row-password').slideDown();
                    }
                });

                $('#User_RandomPassword').change();
            });
        </script>
    <? endif; ?>

     <div class="row row-password">
        <div class="col-md-6">
            <?php echo $form->labelEx($model,'Password'); ?>
            <?php echo $form->passwordField($model,'Password',array('size'=>32,'maxlength'=>32)); ?>
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

        <? if (empty($model->Id)): ?>
            <div class="col-md-6">
                <?php echo $form->labelEx($model, 'Email2'); ?>
                <?php echo $form->textField($model, 'Email2', array('size'=>60,'maxlength'=>100)); ?>
                <?php echo $form->error($model, 'Email2'); ?>
            </div>
        <? endif; ?>
	</div>

     <div class="row ">
         <hr>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php echo $form->labelEx($model, 'CompanyName'); ?>
            <?php echo $form->textField($model, 'CompanyName', array('size'=>50,'maxlength'=>50)); ?>
            <?php echo $form->error($model, 'CompanyName'); ?>
        </div>
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

    <div class="row row-padding">
        <div class="col-md-6">
            <?php echo $form->labelEx($model, 'PlanType: '); ?>
            <?php echo $form->dropDownList($model, 'PlanType',
            array('free' => 'Free', 'medium' => 'Medium', 'premium' => 'Premium'),
                    array()); ?>
            <?php echo $form->error($model, 'Active: '); ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->labelEx($model, 'Active: '); ?>
            <?php echo $form->dropDownList($model, 'Active',
                    array('Yes' => 'Yes', 'No' => 'No'),
                    array()); ?>
            <?php echo $form->error($model, 'Active: '); ?>
        </div>
    </div>

     <div class="row row-padding">
         <div class="col-md-6">
            <?php echo $form->labelEx($model, 'ShowOnDirectory: '); ?>
            <?php echo $form->dropDownList($model, 'ShowOnDirectory',
                    array('Yes' => 'Yes', 'No' => 'No'),
                    array()); ?>
            <?php echo $form->error($model, 'ShowOnDirectory: '); ?>
        </div>
    </div>

    <? if (!empty($model->Id)) : ?>
        <div class="row row-padding">
           <div class="col-md-6">
               <?php echo $form->labelEx($model, 'Added: '); ?>
               <?php echo date('d/m/Y H:i', strtotime($model->Created)); ?>
           </div>
           <div class="col-md-6">
               <?php echo $form->labelEx($model, 'Last Modified: '); ?>
               <?php echo date('d/m/Y H:i', strtotime($model->Modified)); ?>
           </div>
        </div>
        <div class="row row-padding">
            <div class="col-md-6">
                <?php echo $form->labelEx($model, 'LoginType: '); ?>
                <?php echo strtoupper($model->ApplicationType); ?>
            </div>
        </div>
    <? endif; ?>

    <div class="row">
        &nbsp;
    </div>

	<div class="row buttons">
        <div class="col-md-6">
            <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-warning', 'name' => 'Details' )); ?>
        </div>
	</div>

    <?php $this->endWidget(); ?>

</div><!-- form -->