<?php
/* @var $this LinkController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	//'Links',
);
?>

<h1>Update Link <?php echo $model->Hash; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
