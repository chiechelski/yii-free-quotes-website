<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

?>

<div class="row row-signup">
    <div class="col-md-6 col-sm-6">
        <h1>Sign up</h1>
        <?php echo $this->renderPartial('signup_form', array('model'=>$model)); ?>
    </div>
    <div class="col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1">
        <h1>Or Register Using</h1>
        <div class="preferred-login google-login">
            <p>
                <span class="icon"></span>
                <span>
                    <?php $this->widget('application.widgets.google.Google', array('appId'=>'337522633029633', 'userType' => 'customer')); ?>
                </span>
            </p>
        </div>
        <div class="preferred-login facebook-login">
            <p>
                <span class="icon"></span>
                <span>
                    <?php $this->widget('application.widgets.facebook.Facebook', array('appId'=>'337522633029633', 'userType' => 'customer')); ?>
                </span>
            </p>
        </div>
    </div>
</div>
