<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<p> Following the created link(s):</p>
    
Copy the url from the text box below and share with your friends    

<?php
    foreach ($createdLinks as $model)
    {
        echo '<br /><br /><div class="origUrl">' . CHtml::link(CHtml::encode($model->OrigUrl), array('/' . $model->Hash)) .'</div>';
?>

<br />
<textarea><?= $model->createNewUrl(); ?></textarea>
<br /><br />

<?php 
        $this->renderPartial('_social_media_buttons', array('model' => $model));
    }
?> 

