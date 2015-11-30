<?php
/* @var $this LinkController */
/* @var $dataProvider CActiveDataProvider */

unset($this->breadcrumbs);
?>

<div class="row">
    <div class="col-md-12">
        <?php
            $this->widget('BusinessMenuWidget');
        ?>
    </div>
</div>

<div class="row row-account">
    <div class="col-md-12">
        <h1>Business Details</h1>

        <?php if(Yii::app()->user->hasFlash('settings')): ?>
            <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('settings'); ?>
            </div>
        <?php endif; ?>

        <?php echo $this->renderPartial('_form_settings', array('model'=>$model)); ?>
    </div>
</div>
