<?php
/* @var $this LinkController */
/* @var $model Link */
/* @var $form CActiveForm */
?>

<div class="rightInfo accountStats">
    <div style="position: absolute;">
        <div class="block">
            <h1>Account Stats - <?php echo date('M Y'); ?></h1>
            <div class="numberOf">
                <u>Number of:</u>
                <ul>
                    <li>Links : <?=@$linksStats['NbrLinks']?></li>
                    <li>Visits : <?=@$linksStats['NbrVisits']?></li>
                    <li>Unique visits : <?=@$linksStats['NbrUniqueVisits']?></li>
                    <li>Total gains : TBC</li>
                </ul>
            </div>            
            <div style="clear: both"></div>
        </div>
    </div>
</div>
