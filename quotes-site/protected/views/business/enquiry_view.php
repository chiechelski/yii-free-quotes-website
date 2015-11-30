<?php
/* @var $this DBCustomerEnquiryController */
/* @var $model DBCustomerEnquiry */
/* @var $form CActiveForm */

unset($this->breadcrumbs);
?>

<div class="row">
    <div class="col-md-12">
        <?php
            $this->widget('BusinessMenuWidget');
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <a href="/business/customer/enquiries" class="btn btn-default"> Back to customer enquiries </a>
    </div>
</div>

<div class="row">
    &nbsp;
</div>

<div class="view-enquiry">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                 <div class="col-md-12">
                    <h1>Enquiry Details (<?= $model->getRefNum(); ?>)</h1>

                    <?php if(Yii::app()->user->hasFlash('enquiry')): ?>
                        <div class="alert alert-success">
                            <?php echo Yii::app()->user->getFlash('enquiry'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

           <div class="row">
                <div class="col-md-12">
                    <b>Customer:</b>
                    <?php echo $model->getCustomer(); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <b>Title:</b>
                    <?php echo $model->Title; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <b>Description:</b>
                    <?php echo $model->Description; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <b>When:</b>
                    <?php echo $model->When; ?>
                </div>
            </div>

            <? if ($model->When == 'specific-date') : ?>
                <?php $specificDates = $model->getSpecificDates(); ?>
                <?php if (!empty($specificDates)) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <b>Specific Dates:</b>
                        </div>
                    </div>
                    <?php foreach ($specificDates as $sDate): ?>
                        <div class="row">
                            <div class="col-md-12" style="margin-top: 4px;">
                                <ul class="">
                                    <li>
                                        <b>From:</b>
                                        <?
                                            $date = new DateTime($sDate->From);
                                            echo $date->format('d/m/Y H:i');
                                        ?>
                                    </li>
                                    <li>
                                        <b>To:</b>
                                        <?
                                            $date = new DateTime($sDate->To);
                                            echo $date->format('d/m/Y H:i');
                                        ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            <? endif; ?>

            <div class="row">
                <div class="col-md-12">
                    <b>Priority:</b>
                    <?php echo $model->Priority; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <b>Expected Completion Date:</b>
                    <?php if (!empty($model->ExpectedCompletionDate)) : ?>
                        <?php
                            $date = new DateTime($model->ExpectedCompletionDate);
                            echo $date->format('d/m/Y H:i');
                        ?>
                    <?php else : ?>
                        - not defined -
                    <?php endif; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <b>Expected Payment Date:</b>
                    <?php if (!empty($model->ExpectedPaymentDate)) : ?>
                        <?php
                            $date = new DateTime($model->ExpectedPaymentDate);
                            echo $date->format('d/m/Y H:i');
                        ?>
                    <?php else : ?>
                        - not defined -
                    <?php endif; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <b>Active:</b>
                    <?php echo $model->Active; ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 linked-quotes">
            <div class="row">
                <div class="col-md-12">
                    <h1>Your Quote</h1>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php
                            $this->widget('EnquiryQuotesWidget', array('enquiry' => $model, 'type' => 'Supplier'));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function showFiles(id)
    {
        if ($('.file-quote-' + id).css('display') == 'none')
        {
            $('.file-quote-' + id).slideDown();
        }
        else
        {
            $('.file-quote-' + id).slideUp();
        }
        return false;
    }
</script>