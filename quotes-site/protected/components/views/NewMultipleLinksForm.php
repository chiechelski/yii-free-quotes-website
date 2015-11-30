<?php
/* @var $this LinkController */
/* @var $model Link */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'link-form',
)); 

?>
	<?php 
        echo $form->errorSummary($model);     
    ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Url'); ?>
		<?php echo $form->textArea($model,'OrigUrl',array('size'=>50, 'rows'=>8, 'cols'=>50)); ?>
		<?php echo $form->error($model,'OrigUrl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UrlBase'); ?>
		<?php 
            echo $form->dropDownList($model,'UrlBase', Link::$baseURLs);
        ?>
		<?php echo $form->error($model,'UrlBase'); ?>
	</div>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('name' => 'submitMultipleLinks')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->