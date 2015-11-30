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
    <div class="col-md-5">
        <h1>Business Details</h1>

        <?php if(Yii::app()->user->hasFlash('profile')): ?>
            <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('profile'); ?>
            </div>
        <?php endif; ?>

        <?php echo $this->renderPartial('_form', array(
            'model' => $model)); ?>
    </div>
    <div class="col-md-6 col-md-offset-1">
        <h1>Select your Categories</h1>

        <?php if(Yii::app()->user->hasFlash('categories')): ?>
            <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('categories'); ?>
            </div>
        <?php endif; ?>

        <?php echo $this->renderPartial('_form_categories', array(
            'model' => $model,
            'categories' => $categories,
            'subCategories' => $subCategories,
            'selectedSubCategories' => $selectedSubCategories)); ?>
    </div>
</div>
