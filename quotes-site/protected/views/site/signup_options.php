<?php
/* @var $this SiteController */
/* @var $model Site */
/* @var $form CActiveForm */
?>

<div class="popup">
    <div class="new-login-left">
        <h3>
            <?=yii::t('signup', 'Sign up or')?>
            <a id="login-link" href="/users/login?returnurl=%2fquestions%2f16745151%2fcss-space-li-so-they-are-evenly-distributed-vertically-in-a-div-of-fixed-he%23new-answer">log in</a>
        </h3>
        <div class="preferred-login google-login">
            <p>
                <span class="icon"></span>
                <span>                    
                    <?php $this->widget('application.widgets.google.Google', array()); ?>
                </span>
            </p>
        </div>
        <div class="preferred-login facebook-login">
            <p>
                <span class="icon"></span>
                <span>
                    <?php $this->widget('application.widgets.facebook.Facebook', array('appId'=>'354639041272686')); ?>
                </span>
            </p>
        </div>
        <div class="preferred-login stackexchange-login">
            <p>
                <span class="icon"></span>
                <span>
                    <?
                        echo CHtml::link(yii::t('signup', 'Sign up using ShareThis4Me account') , '/site/signup',
                            array('style'=>'cursor: pointer;'));
                    ?>
                </span>
            </p>
        </div>
    </div>
</div>
<!-- form -->