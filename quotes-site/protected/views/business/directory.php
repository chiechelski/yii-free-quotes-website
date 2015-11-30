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
        <h1>Directory Details</h1>

        <?php if(Yii::app()->user->hasFlash('directory')): ?>
            <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('directory'); ?>
            </div>
        <?php endif; ?>

        <?php echo $this->renderPartial('_form_directory', array('model'=>$model)); ?>
    </div>
</div>
