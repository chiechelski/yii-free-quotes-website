<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	//'Users'=>array('index'),
	'Signup Business',
);
?>

<div class="row row-signup">
    <div class="col-md-6 col-sm-6">
        <h1>Create a Business Account</h1>
        <?php echo $this->renderPartial('signup_business_form', array('model' => $model, 'type' => $type)); ?>
    </div>
    <div class="col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1">
        <h1>Or Register Using</h1>
        <div class="preferred-login google-login">
            <p>
                <span class="icon"></span>
                <span>
                    <?php $this->widget('application.widgets.google.Google', array('appId'=>'337522633029633', 'userType' => 'supplier')); ?>
                </span>
            </p>
        </div>
        <div class="preferred-login facebook-login">
            <p>
                <span class="icon"></span>
                <span>
                    <?php $this->widget('application.widgets.facebook.Facebook', array('appId'=>'337522633029633', 'userType' => 'supplier')); ?>
                </span>
            </p>
        </div>
    </div>
</div>