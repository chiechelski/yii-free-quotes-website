<?php
/* @var $this LinkController */
/* @var $model Link */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'link-form',
    /*'clientOptions'=>array('validateOnSubmit'=>true),
	'enableAjaxValidation'=>true ,*/
)); 

?>
	<!--p class="note">Fields with <span class="required">*</span> are required.</p -->

	<?php 
        echo $form->errorSummary($model);     
    ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Url'); ?>
		<?php echo $form->textField($model,'OrigUrl',array('size'=>50,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'OrigUrl'); ?>
	</div>

    <div style="clear: both;"></div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'UrlBase'); ?>
		<?php 
            echo $form->dropDownList($model,'UrlBase', Link::$baseURLs);
        ?>        
    </div>
    <div class="row">        
        <?php echo $form->labelEx($model,'Url Identifier'); ?>
        <?php echo $form->textField($model,'Hash',array('size'=>32, 'style' => 'display: inline;','maxlength'=>128)); ?>
		<?php echo $form->error($model,'UrlBase'); ?>
        <?php echo $form->error($model,'Hash'); ?>
	</div>
    
    <div style="clear: both;"></div>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('name' => 'submitLink')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->