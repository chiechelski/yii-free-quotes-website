<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="row row-login">
    <div class="col-md-4 col-sm-6">

        <?php if(Yii::app()->user->hasFlash('signup')): ?>
            <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('signup'); ?>
            </div>
        <?php endif; ?>

        <?php if(Yii::app()->user->hasFlash('categoryQuote')): ?>
            <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('categoryQuote'); ?>
            </div>
        <?php elseif(Yii::app()->user->hasFlash('password-reset')): ?>
            <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('password-reset'); ?>
            </div>
        <?php elseif(Yii::app()->user->hasFlash('verify-failed')): ?>
            <div class="alert alert-danger">
                <?php echo Yii::app()->user->getFlash('verify-failed'); ?>
            </div>
        <?php elseif(Yii::app()->user->hasFlash('verify-success')): ?>
            <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('verify-success'); ?>
            </div>
        <?php endif; ?>

        <h1>Login</h1>
        <p>Please fill out the following form with your login credentials:</p>

        <div id="login-form" class="form">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'login-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
        )); ?>

            <p class="note">Fields with <span class="required">*</span> are required.</p>

            <div class="row">
                <?php echo $form->labelEx($model,'username'); ?>
                <?php echo $form->textField($model,'username'); ?>
                <?php echo $form->error($model,'username'); ?>
            </div>

            <div style="clear:both;"></div>

            <div class="row">
                <?php echo $form->labelEx($model,'password'); ?>
                <?php echo $form->passwordField($model,'password'); ?>
                <?php echo $form->error($model,'password'); ?>
            </div>

             <div class="row buttons">
                <?php echo CHtml::submitButton('Login'); ?>
            </div>

            <div class="row buttons">
                <a href="/login/reset">
                    Forgot your password?
                </a>
            </div>

            <div style="clear:both;"></div>

            <!--div class="row rememberMe">
                <?php echo $form->checkBox($model,'rememberMe'); ?>
                <?php echo $form->label($model,'rememberMe'); ?>
                <?php echo $form->error($model,'rememberMe'); ?>
            </div-->

        <?php $this->endWidget(); ?>
        </div>
        <!-- form -->
    </div>
    <div class="col-md-4 col-md-offset-2 col-sm-5 col-sm-offset-1">
        <div class="social-media-login">
            <h3>
                You can easily use your existent profile on Facebook or Google to login
            </h3>
            <div class="preferred-login google-login">
                <p>
                    <span class="icon"></span>
                    <span>
                        <?php $this->widget('application.widgets.google.Google', array('appId'=>'337522633029633')); ?>
                    </span>
                </p>
            </div>
            <div class="preferred-login facebook-login">
                <p>
                    <span class="icon"></span>
                    <span>
                        <?php $this->widget('application.widgets.facebook.Facebook', array('appId'=>'337522633029633')); ?>
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>