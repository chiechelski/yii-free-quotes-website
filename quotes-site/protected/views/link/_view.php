<?php
/* @var $this LinkController */
/* @var $data Link */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Hash')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->OrigUrl), array('show', 'id'=>$data->Hash)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UrlBase')); ?>:</b>
	<?php echo CHtml::encode($data->UrlBase); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('User')); ?>:</b>
	<?php echo CHtml::encode($data->User); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Created')); ?>:</b>
	<?php echo CHtml::encode($data->Created); ?>
	<br />


</div>