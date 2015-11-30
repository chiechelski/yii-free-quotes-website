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

	<div class="row">
        <?php echo $form->error($model,'OrigUrl'); ?>
		<?php echo $form->textField($model,'OrigUrl',array('size'=>50, 'maxlength'=>1000, 'id' => 'shrinkUrl', 'placeholder' => 'http://')); ?>		
        <?php echo CHtml::submitButton('Shrink', array('name' => 'submitLink')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
    $('#shrinkUrl').keyup(function(){
        var val = $(this).val();
        if (val == "http://")
        {
            $(this).css({ color: '#888' });
        } 
        else 
        {
            $(this).css({ color: '#222' });
        }
    });
</script>