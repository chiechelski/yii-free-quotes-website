<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact Us',
);
?>

<div class="row">
    <div class="col-md-3 col-sm-4">
        <?php
            $this->widget('LeftMenuWidget');
        ?>
    </div>

    <div class="col-md-9 col-sm-8">

        <h1>Contact Us</h1>

        <?php if(Yii::app()->user->hasFlash('contact')): ?>

            <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('contact'); ?>
            </div>

        <?php else: ?>

            <div class="row">
                <div class="col-md-6">
                    <p>
                        <b>We're here to help with any queries you may have.</b>
                    </p>

                    <div class="form">
                        <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'contact-form',
                            'enableClientValidation'=>true,
                            'clientOptions'=>array(
                                'validateOnSubmit'=>true,
                            ),
                        )); ?>

                        <p class="note">Fields with <span class="required">*</span> are required.</p>

                        <?php echo $form->errorSummary($model, null, null, array('class' => 'row alert alert-danger error-summary')); ?>

                        <div class="row">
                            <?php echo $form->labelEx($model,'name'); ?>
                            <?php echo $form->textField($model,'name'); ?>
                            <?php echo $form->error($model,'name'); ?>
                        </div>

                        <div class="row">
                            <?php echo $form->labelEx($model,'email'); ?>
                            <?php echo $form->textField($model,'email'); ?>
                            <?php echo $form->error($model,'email'); ?>
                        </div>

                        <div class="row">
                            <?php echo $form->labelEx($model,'phoneNumber'); ?>
                            <?php echo $form->textField($model,'phoneNumber'); ?>
                            <?php echo $form->error($model,'phoneNumber'); ?>
                        </div>

                        <div class="row">
                            <?php echo $form->labelEx($model,'subject'); ?>
                            <?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
                            <?php echo $form->error($model,'subject'); ?>
                        </div>

                        <div class="row">
                            <?php echo $form->labelEx($model,'body'); ?>
                            <?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
                            <?php echo $form->error($model,'body'); ?>
                        </div>

                        <?php if(CCaptcha::checkRequirements()): ?>
                        <div class="row">
                            <div style="float: right; width: 155px;">
                                <?php echo $form->labelEx($model,'verifyCode'); ?>
                                <?php echo $form->textField($model,'verifyCode'); ?>
                                <div style="width: 200px;">
                                    <?php echo $form->error($model,'verifyCode'); ?>
                                </div>
                            </div>
                            <div style="float: left; width: 120px;">
                                <?php $this->widget('CCaptcha'); ?>
                                <div class="hint" style="padding-top: 10px; float: left;position: relative;width: 380px;">
                                    Please enter the letters as they are shown in the image above.
                                    <br/>Letters are not case-sensitive.
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="row buttons">
                            <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-warning')); ?>
                        </div>

                    <?php $this->endWidget(); ?>

                    </div><!-- form -->
                </div>
                <div class="col-md-6">
                    <br />
                    <div>
                        <b>Contact us by Phone</b>
                    </div>
                    <div>
                        Phone: +64 9 390 4 DnD  (363)
                    </div>
                    <div>
                        Mobile: + 64 22 021 30 40
                    </div>

                    <div>
                        <br />
                        <br />
                        <span class="green">
                            Done & Dusted.
                        </span>
                        2/120 Mayoral Drive - Auckland, 1010, New Zealand <br />
                        Office Hours: Monday - Friday 9:00am - 5:00pm
                    </div>

                    <div class="map-border">
                        <div id="map-canvas" style="width: 100%; height: 300px;">
                        </div>
                    </div>

                    <br />
                    <?php /*
                    <div>
                        <b>Contact us by Email</b>
                    </div>
                    <div>
                        <ul  style="margin-left: 0px; padding-left: 20px;">
                            <li>
                                For any general enquiries please contact us on:
                                <a href="mailto: info@donedusted.co.nz">info@donedusted.co.nz</a>
                            </li>
                            <li>
                                For sales enquiries please contact us on:
                                <a href="mailto: sales@donedusted.co.nz">sales@donedusted.co.nz</a>
                            </li>
                            <li>
                                For any marketing enquiries please contact us on:
                                <a href="mailto: marketing@donedusted.co.nz">marketing@donedusted.co.nz</a>
                            </li>
                            <li>
                                For any account enquiries please contact us on:
                                <a href="mailto: accounts@donedusted.co.nz">accounts@donedusted.co.nz</a>
                            </li>
                        </ul>
                        <small>
                            * Please allow 48hrs for a response, we'll do our best to get back to you asap.
                        </small>
                    </div>
                    */
                    ?>

                    <script type="text/javascript"
                        src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false">
                    </script>

                    <script type="text/javascript">
                        function initialize()
                        {
                            var myLatlng = new google.maps.LatLng(-36.853235, 174.764303);
                            var mapOptions = {
                                center: myLatlng,
                                zoom: 14,
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            };
                            var map = new google.maps.Map(document.getElementById("map-canvas"),
                                mapOptions);

                            var marker = new google.maps.Marker({
                                position: myLatlng,
                                /*icon: "http://yiidonedusted.co.nz/images/logo-tick.png",*/
                                map: map,
                                title: 'Done & Dusted'
                            });
                        }

                        google.maps.event.addDomListener(window, 'load', initialize);
                    </script>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
