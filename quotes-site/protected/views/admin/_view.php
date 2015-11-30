<?php
/* @var $this LinkController */
/* @var $data Link */

// Getting the page peaker thumbnail - need to move it to a widget later

$count = $index % 4;

if ($count > 1)
    $preffix = ($count+1);
else
    $preffix = '';

?>

<div class="view" onclick="javascript: window.location.href='<?=$data->createNewUrl()?>';">
    <div class="thumbnail">
        <img src="http://api<?=$preffix?>.pagepeeker.com/v2/thumbs.php?size=t&wait=1&url=<?=$data->OrigUrl?> " />
    </div>
    <div>
        <b>Link:</b>
        <?php echo CHtml::link(CHtml::encode($data->createNewUrl()), array('link/' .$data->Hash)); ?>
    </div>
    <div>
        <b>Url:</b>
        <?php echo CHtml::link(CHtml::encode($data->OrigUrl), array('link/' .$data->Hash)); ?>
    </div>
    <div>
        <b><?php echo CHtml::encode($data->getAttributeLabel('Created')); ?>:</b>
        <?php echo CHtml::encode(date('j M Y H:m',strtotime($data->Created))); ?>
    </div>	
</div>
