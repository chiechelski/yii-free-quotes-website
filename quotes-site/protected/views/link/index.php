<?php
/* @var $this LinkController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Links',
);

$user = Yii::app()->user->getInfo();

$this->menu=array(
	array('label' => 'Create Link', 'url' => array($user?'/admin/createlink': 'site/index')),
);
?>

<h1>Links</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider' => $categories,
	'itemView' => '_view',
)); ?>
