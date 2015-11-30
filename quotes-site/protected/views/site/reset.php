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

        <?php if(Yii::app()->user->hasFlash('expired-reset')): ?>
            <div class="alert alert-danger error-summary">
                <?php echo Yii::app()->user->getFlash('expired-reset'); ?>
            </div>
        <?php endif; ?>

        <?php if(Yii::app()->user->hasFlash('reset')): ?>
            <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('reset'); ?>
            </div>
        <?php endif; ?>

        <h1>Forgot your password?</h1>

        <div id="login-form" class="form">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'login-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
        )); ?>

            <div class="row">
                <?php echo $form->labelEx($model,'Email'); ?>
                <?php echo $form->textField($model,'Email'); ?>
                <?php echo $form->error($model,'Email'); ?>
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
                Follow the step below to reset your password
            </h4>
            <div>
                <ol class="">
                    <li>
                        <b>Insert your email address and press the button</b>
                    </li>
                    <li>
                        Open your email address and click on the link we sent
                    </li>
                    <li>
                        Use the form to reset your password
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>