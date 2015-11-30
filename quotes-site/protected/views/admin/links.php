<?php
/* @var $this LinkController */
/* @var $dataProvider CActiveDataProvider */

$user = Yii::app()->user->getInfo(); 

?>

<h1><?= yii::t('menu', 'Manage Links') ?></h1>

<div class="manage-links">
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>
</div>