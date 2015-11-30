<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<p> Follow the steps below to create new links:</p>

<div class="createLink">
    <div class="leftBlock">
        <h3>
            Single Link
        </h3>
        <?php $this->widget('NewLinkFormWidget',array()); ?>
        <div style="clear: both;"></div>        
    </div>
    
    <div class="leftBlock">
        <h3>
            Multiple Links
        </h3>
        <?php $this->widget('NewMultipleLinksFormWidget',array()); ?>
        <div style="clear: both;"></div>
    </div>    
</div>
