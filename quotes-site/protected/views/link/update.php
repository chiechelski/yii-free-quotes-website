<?php
/* @var $this LinkController */
/* @var $model Link */

$this->breadcrumbs=array(
	'Links'=>array('index'),
	$model->Hash=>array('view','id'=>$model->Hash),
	'Update',
);

$this->menu=array(
	array('label'=>'List Link', 'url'=>array('index')),
	array('label'=>'Create Link', 'url'=>array('create')),
	array('label'=>'View Link', 'url'=>array('view', 'id'=>$model->Hash)),
	array('label'=>'Manage Link', 'url'=>array('admin')),
);
?>

<h1>Update Link <?php echo $model->Hash; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>