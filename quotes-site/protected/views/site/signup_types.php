<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Types';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="row row-signup-types">
    <div class="col-md-4 col-sm-6">

        <h1>Signup</h1>
        <p>Please fill out the following form with your login credentials:</p>

        <div id="login-form">
            <div class="row">

            </div>
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