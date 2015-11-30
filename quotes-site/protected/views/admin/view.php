<?php
/* @var $this LinkController */
/* @var $model Link */

/*
$this->breadcrumbs=array(
	'Links'=>array('index'),
	$model->Hash,
);
*/

$this->menu=array(
	array('label'=>'List Link', 'url'=>array('index')),
	array('label'=>'Create Link', 'url'=>array('create')),
	array('label'=>'Update Link', 'url'=>array('update', 'id'=>$model->Hash)),
	array('label'=>'Delete Link', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Hash),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Link', 'url'=>array('admin')),
);
?>

<h1>Copy the url from the text box below and share with your friends </h1>

<br /><br />
<div id="view-content">
    Copy the url from the text box below and share with your friends    
    
    <br /><br />
    <textarea><?= $model->createNewUrl(); ?></textarea>
    <br /><br />
    
    <?php $this->renderPartial('_social_media_buttons',array(
        'model'=>$model,
    )); ?> 
</div>
