<?php
/*
    $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'link-grid',
        'dataProvider' => $categories->search(),
        'filter' => $categories,
        'columns' => array(
            'Hash',
            'OrigUrl',
            'UrlBase',
            'User',
            'Created',
            array(
                'class'=>'CButtonColumn',
            ),
        ),
    ));
    */
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider' => $categories,
	'itemView' => '_view',
)); ?>