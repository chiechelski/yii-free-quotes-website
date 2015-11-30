<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Username')); ?>:</b>
	<?php echo CHtml::encode($data->Username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Password')); ?>:</b>
	<?php echo CHtml::encode($data->Password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FirstName')); ?>:</b>
	<?php echo CHtml::encode($data->FirstName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LastName')); ?>:</b>
	<?php echo CHtml::encode($data->LastName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email')); ?>:</b>
	<?php echo CHtml::encode($data->Email); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('UserType')); ?>:</b>
	<?php echo CHtml::encode($data->UserType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CompanyName')); ?>:</b>
	<?php echo CHtml::encode($data->CompanyName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Address1')); ?>:</b>
	<?php echo CHtml::encode($data->Address1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Address2')); ?>:</b>
	<?php echo CHtml::encode($data->Address2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('City')); ?>:</b>
	<?php echo CHtml::encode($data->City); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('State')); ?>:</b>
	<?php echo CHtml::encode($data->State); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PostCode')); ?>:</b>
	<?php echo CHtml::encode($data->PostCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Country')); ?>:</b>
	<?php echo CHtml::encode($data->Country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Phone')); ?>:</b>
	<?php echo CHtml::encode($data->Phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PaymentType')); ?>:</b>
	<?php echo CHtml::encode($data->PaymentType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PaymentAccount')); ?>:</b>
	<?php echo CHtml::encode($data->PaymentAccount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GoogleAnalytics')); ?>:</b>
	<?php echo CHtml::encode($data->GoogleAnalytics); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Lang')); ?>:</b>
	<?php echo CHtml::encode($data->Lang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserVerification')); ?>:</b>
	<?php echo CHtml::encode($data->UserVerification); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Created')); ?>:</b>
	<?php echo CHtml::encode($data->Created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Modified')); ?>:</b>
	<?php echo CHtml::encode($data->Modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Active')); ?>:</b>
	<?php echo CHtml::encode($data->Active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Validated')); ?>:</b>
	<?php echo CHtml::encode($data->Validated); ?>
	<br />

	*/ ?>

</div>