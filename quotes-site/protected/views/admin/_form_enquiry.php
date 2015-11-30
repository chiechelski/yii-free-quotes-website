<?php
/* @var $this DBCustomerEnquiryController */
/* @var $model DBCustomerEnquiry */
/* @var $form CActiveForm */
?>

<div class="form settings-form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dbcustomer-enquiry-customer_enquiry-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model, null, null, array('class' => 'row alert alert-danger error-summary')); ?>

    <div class="row row-customer">
		<?php echo $form->labelEx($model,'User'); ?>

        <?php if (!empty($user->Id)) : ?>
            <span>
                <?php echo ': ' . $user->getFullName() ?>
            </span>
            <input type="checkbox" id="searchCustomer" value="1" onclick="if (this.checked) { $('.search-query').css('display', '');} else { $('.search-query').css('display', 'none');}  ">
            <label for="searchCustomer">
                Update Customer
            </label>
        <?php endif; ?>
        <?
            $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                'name'=>'searchbox',
                'value'=>'',
                'source'=>CController::createUrl('/admin/customerautocomplete'),
                'options'=>array(
                'showAnim' => 'fold',
                'minLength' => '2',
                'select'=>'js:function( event, ui ) {
                            $("#searchbox").val( ui.item.label );
                            $("#DBCustomerEnquiry_User").val( ui.item.value );
                            return false;
                      }',
                ),
                'htmlOptions'=>array(
                'onfocus' => 'js: this.value = null; $("#searchbox").val(null);',
                'class' => 'input-xxlarge search-query',
                'placeholder' => "Search for customers...",
                'style' => (!empty($user->Id)?'display: none;': '')
                ),
            ));
        ?>

		<?php echo $form->hiddenField($model,'User'); ?>
		<?php echo $form->error($model,'User'); ?>
	</div>

	<div class="row">
        <div class="col-md-12">
            <?php echo $form->labelEx($model,'Title'); ?>
            <?php echo $form->textField($model,'Title'); ?>
            <?php echo $form->error($model,'Title'); ?>
        </div>
	</div>

    <div class="row">
        <div class="col-md-12">
            <?php echo $form->labelEx($model,'Description'); ?>
            <?php echo $form->textarea($model,'Description', array('rows' => '8')); ?>
            <?php echo $form->error($model,'Description'); ?>
        </div>
	</div>

    <? /*
	<!--div class="row">
		<?php echo $form->labelEx($model,'Feedback'); ?>
		<?php echo $form->textField($model,'Feedback'); ?>
		<?php echo $form->error($model,'Feedback'); ?>
	</div-->
     */ ?>

	<div class="row">
        <div class="col-md-6">
            <?php echo $form->labelEx($model,'Priority'); ?>
            <?php echo $form->dropDownList($model, 'Priority',
                array('UrgentJob' => 'Urgent Job',
                    'UrgentQuote' => 'Urgent Quote',
                    'Week' => 'Week', 'Month' => 'Month'),
                array()); ?>
            <?php echo $form->error($model,'Priority'); ?>
        </div>

        <? /*

        <!-- div class="col-md-3">
            <?php echo $form->labelEx($model,'Proceed'); ?>
            <?php echo $form->dropDownList($model, 'Proceed',
                array('Yes' => 'Yes', 'No' => 'No'),
                array()); ?>
            <?php echo $form->error($model,'Proceed'); ?>
        </div -->

        */ ?>

        <div class="col-md-3">
            <?php echo $form->labelEx($model,'CommissionPaid'); ?>
            <?php echo $form->dropDownList($model, 'CommissionPaid',
                array('Yes' => 'Yes', 'No' => 'No'),
                array()); ?>
            <?php echo $form->error($model,'CommissionPaid'); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->labelEx($model, 'Active: '); ?>
            <?php echo $form->dropDownList($model, 'Active',
                array('Yes' => 'Yes', 'No' => 'No'),
                array()); ?>
            <?php echo $form->error($model, 'Active: '); ?>
        </div>
	</div>

    <div class="row">
        <br />
        <div class="col-md-3 input-append date">
            <?php echo $form->labelEx($model,'ExpectedCompletionDate'); ?>
            <?php echo $form->textField($model, 'ExpectedCompletionDate'); ?>
            <?php echo $form->error($model,'ExpectedCompletionDate'); ?>
        </div>

        <div class="col-md-3 input-append date">
            <?php echo $form->labelEx($model,'ExpectedPaymentDate'); ?>
            <?php echo $form->textField($model, 'ExpectedPaymentDate'); ?>
            <?php echo $form->error($model,'ExpectedPaymentDate'); ?>
        </div>
	</div>

	<div class="row buttons">
        <div class="col-md-6">
            <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-warning', 'name' => 'Details' )); ?>
        </div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
    var date = new Date();
    date.setDate(date.getDate());

    $('#DBCustomerEnquiry_ExpectedCompletionDate').datepicker({
        format: "yyyy-mm-dd",
        startDate: date
    });

    $('#DBCustomerEnquiry_ExpectedPaymentDate').datepicker({
        format: "yyyy-mm-dd",
        startDate: date
    });
</script>