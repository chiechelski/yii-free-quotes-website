<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="row row-reset">
    <div class="col-md-4">

        <?php if(Yii::app()->user->hasFlash('signup')): ?>
            <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('signup'); ?>
            </div>
        <?php elseif(Yii::app()->user->hasFlash('categoryQuote')): ?>
            <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('categoryQuote'); ?>
            </div>
        <?php endif; ?>

        <? if ($type == 'password'): ?>
            <h1>Set your password</h1>
        <? else: ?>
            <h1>Reset your password</h1>
        <? endif; ?>

        <div id="login-form" class="form">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'reset-password-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
        )); ?>

            <?php echo $form->errorSummary($model, null, null, array('class' => 'row alert alert-danger error-summary')); ?>

            <div class="row">
                <?php echo $form->labelEx($model,'Email'); ?>
                <?php echo $form->textField($model,'Email', array('disabled' => 'disabled')); ?>
                <?php echo $form->error($model,'Email'); ?>
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
                <?php echo CHtml::submitButton('Reset Password'); ?>
            </div>

        <?php $this->endWidget(); ?>
        </div>
        <!-- form -->
    </div>
    <div class="col-md-4 col-md-offset-1">
        <div class="social-media-login">
            <h4>
                Follow the step below to <?= ($type == 'password'?'set':'reset'); ?> your password
            </h4>
            <div>
                <ol class="">
                    <li>
                        Insert your email address and press the button
                    </li>
                    <li>
                        Open your email address and click on the link we sent
                    </li>
                    <li>
                        <b> Use the form to <?= ($type == 'password'?'set':'reset'); ?> your password</b>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $('.tooltip-i').tooltip();
    });
</script>