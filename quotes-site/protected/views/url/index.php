<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>
    <?php echo yii::t('site', 'Welcome to <i>{siteName}</i>',
        array('{siteName}' => CHtml::encode(Yii::app()->name))); ?>
<h1>
    </h1>

<p><?php echo yii::t('site', 'It is a new way to share a link and make money.'); ?></p>

<?php /* $this->widget('UserLoginWidget',array('visible'=>Yii::app()->user->isGuest)); */ ?>

<?php $this->widget('NewLinkFormWidget',array()); ?>

