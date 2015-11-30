<?php
/* @var $this LinkController */
/* @var $model Link */
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
