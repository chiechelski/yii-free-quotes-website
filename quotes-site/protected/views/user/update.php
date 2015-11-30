<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

unset($this->breadcrumbs);
?>

<div class="row">
    <div class="col-md-12">
        <?php
            $user = Yii::app()->user->getInfo();

            if ($user->UserType == 'administrator')
                $this->widget('AdminMenuWidget');
            elseif ($user->UserType == 'customer')
                $this->widget('BusinessMenuWidget');
        ?>
    </div>
</div>

<div class="row row-account">
    <div class="col-md-12">
        <h1>My account</h1>

        <?php if(Yii::app()->user->hasFlash('settings')): ?>
            <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('settings'); ?>
            </div>
        <?php endif; ?>

        <?php echo $this->renderPartial('/business/_form_settings', array('model'=>$model)); ?>
    </div>
</div>
