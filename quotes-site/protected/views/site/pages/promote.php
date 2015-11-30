<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Promote Your Service';
$this->breadcrumbs=array(
	'Promote Your Service',
);
?>

<div class="row">
    <div class="col-md-3">
        <?php
            $this->widget('LeftMenuWidget');
        ?>
    </div>

    <div class="col-md-9">
        <h1>Promote Your Service</h1>

        <p>This is a "static" page. You may change the content of this page
        by updating the file <code><?php echo __FILE__; ?></code>.</p>
    </div>
</div>