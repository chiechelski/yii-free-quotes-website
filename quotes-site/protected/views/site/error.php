<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error 404';
/*$this->breadcrumbs=array(
	'Error 404',
);
*/
?>

<div class="row error">
    <h1>Can't find this page</h1>
    Sorry, but we couldn't find this page.  Please use the menu above to go to the page you want.
    <?php echo CHtml::encode(@$message); ?>
</div>