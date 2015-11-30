<?php
/* @var $this DBBusinessQuoteController */
/* @var $model DBBusinessQuote */
/* @var $form CActiveForm */
?>

<div class="form settings-form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dbbusiness-quote-business_quote-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>

	<?php echo $form->errorSummary($model, null, null, array('class' => 'row alert alert-danger error-summary')); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'User'); ?>

        <?php
            if (empty($user->CompanyName))
            {
                $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                    'name'=>'searchbox',
                    'value'=>'',
                    'source'=>CController::createUrl('/admin/supplierautocomplete'),
                    'options'=>array(
                    'showAnim' => 'fold',
                    'minLength' => '2',
                    'select'=>'js:function( event, ui ) {
                                $("#searchbox").val( ui.item.label );
                                $("#DBBusinessQuote_User").val( ui.item.value );
                                return false;
                          }',
                    ),
                    'htmlOptions'=>array(
                    'onfocus' => 'js: this.value = null; $("#searchbox").val(null);',
                    'class' => 'input-xxlarge search-query',
                    'placeholder' => "Search for company...",
                    ),
                ));
            }
            else
            {
                echo $user->CompanyName;
            }
        ?>

		<?php echo $form->hiddenField($model,'User'); ?>
		<?php echo $form->error($model,'User'); ?>
	</div>

	<div class="row">
        <div class="row">
            <?php echo $form->labelEx($model,'Title'); ?>
            <?php echo $form->textField($model,'Title'); ?>
            <?php echo $form->error($model,'Title'); ?>
        </div>
	</div>

	<div class="row">
        <div class="col-md-12 col-sm-12">
            <?php echo $form->labelEx($model,'Description'); ?>
            <?php echo $form->textarea($model,'Description', array('rows' => '8')); ?>
            <?php echo $form->error($model,'Description'); ?>
        </div>
	</div>

    <div class="row">
        <div class="col-md-6 col-sm-6">
            <?php echo $form->labelEx($model,'Price'); ?>
            <?php echo $form->textField($model,'Price'); ?>
            <?php echo $form->error($model,'Price'); ?>
        </div>
        <div class="col-md-6 col-sm-6">
            <?php echo $form->labelEx($model,'Tax'); ?>
            <?php echo $form->textField($model,'Tax'); ?>
            <?php echo $form->error($model,'Tax'); ?>
        </div>
	</div>

    <div class="row" style="margin-top: 12px;">
        <div class="col-md-6 col-sm-6">
            <?php echo $form->labelEx($model,'File'); ?>
            <?php echo $form->fileField($model, 'File', array('maxlength' => 255)); ?>
            <?php echo $form->error($model,'File'); ?>
        </div>
        <div class="col-md-6 col-sm-6">
            <?php $files = $model->loadFiles(); ?>
            <?php if (!empty($files)): ?>
                <label>Uploaded Files</label>
                <div class="row">
                    <?php foreach ($files as $file): ?>
                        <div>
                            <a href="/customer/quote/<?= $file['Quote'] ?>/file/<?= $file['Id'] ?>" target="_blank">
                                <img src="/images/link-icon.png" /> <?= $file['FileName'] ?>
                            </a>
                            &nbsp;
                            <a style="color: red;" href="/business/quote/<?= $file['Quote'] ?>/file/<?= $file['Id'] ?>/del"
                               onclick="javascript: if (confirm('Sure to delete?')) return true; else return false; ">
                                (X)
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
	</div>

	<div class="row buttons">
        <div class="col-md-6 col-sm-6">
            <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-warning', 'name' => 'Details' )); ?>
        </div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->