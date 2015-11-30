<?php
/* @var $this DBCustomerEnquiryController */
/* @var $model DBCustomerEnquiry */
/* @var $form CActiveForm */

unset($this->breadcrumbs);
?>

<div class="row">
    <div class="col-md-12">
        <?php
            $this->widget('AdminMenuWidget');
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <a href="/admin/enquiries" class="btn btn-default"> Back to Enquiries list </a>
        <? if (!empty($model->Id)) : ?>
            <a href="/admin/enquiry/<?= $model->Id ?>" class="btn btn-info"> Edit Enquiry Page </a>
        <? endif; ?>
    </div>
    <div class="col-md-6">
        <? if (!empty($model->Id)) : ?>
            <a href="/admin/quote/enquiry/<?= $model->Id ?>" class="btn btn-info"> Add Quote </a>
        <? endif; ?>
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
                    <b>Commission Paid:</b>
                    <?php echo $model->CommissionPaid; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <b>Active:</b>
                    <?php echo $model->Active; ?>
                </div>
            </div>

            <?php $notes = $model->getNotes(); ?>
            <div class="row">
                <br />
                <div class="col-md-11">
                    <h1>Notes</h1>
                </div>
            </div>

            <?php if (Yii::app()->user->hasFlash('enquiryNoteAdded')): ?>
                <div class="alert alert-success col-md-11">
                    <?php echo Yii::app()->user->getFlash('enquiryNoteAdded'); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($notes)) : ?>
                <div class="row" style="max-height: 400px; overflow: auto; margin-bottom: 20px;">
                    <div class="col-md-11 col-sm-11">
                        <table class="table">
                            <thead>
                                <tr>
                                  <th>Note</th>
                                  <th>Author</th>
                                  <th>Added</th>
                                </tr>
                            </thead>
                            <?php foreach ($notes as $note): ?>
                                <tr>
                                    <td>
                                        <?= str_replace(PHP_EOL, '<br />', $note['Note']); ?>
                                    </td>
                                    <td>
                                        <?= $note['FirstName']; ?>
                                    </td>
                                    <td>
                                        <?
                                            $date = new DateTime($note['Added'], new DateTimeZone('GMT'));
                                            $date->setTimezone(new DateTimeZone('Pacific/Auckland'));
                                            echo $date->format('d/m/Y H:i');
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col-md-11 col-sm-11" style="margin-bottom: 10px;">
                        - no notes -
                    </div>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-11 col-sm-11">
                    <a href="#" onclick="javascript: loadNotes(); return false;" id="add-note-link">Add note</a>
                </div>
            </div>

            <br />

            <div class="row">
                <div class="col-md-11">
                    <?php
                        $this->widget('AddNoteFormWidget', array('enquiry' => $model));
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <h1>Linked Quotes</h1>
                </div>

                <?php if(Yii::app()->user->hasFlash('quote')): ?>
                    <div class="alert alert-success">
                        <?php echo Yii::app()->user->getFlash('quote'); ?>
                    </div>
                <?php endif; ?>

                <div class="col-md-12">
                    <?php
                        $this->widget('EnquiryQuotesWidget', array('enquiry' => $model));
                    ?>
                </div>
            </div>

            <?php $customer = $model->getCustomerInfo(); ?>
            <?php if (!empty($customer)) : ?>
                <div class="row">
                    <br />
                    <div class="col-md-12">
                        <h1>Customer Details</h1>
                    </div>

                    <div class="col-md-12">
                        <b>Name:</b>
                        <?php echo $customer->FirstName . ' ' . $customer->LastName; ?>
                    </div>

                    <div class="col-md-12">
                        <b>Email:</b>
                        <?= $customer->Email; ?>
                    </div>

                    <div class="col-md-12">
                        <b>Phone:</b>
                        <?php echo $customer->Phone . ' / ' . $customer->Mobile; ?>
                    </div>

                    <div class="col-md-12">
                        <b>Address:</b>
                        <?php echo $customer->Address1; ?>
                        <? if (!empty($customer->Address2)): ?>
                            <br /> <?= $customer->Address2; ?>
                        <? endif; ?>
                        <br /> <?= $customer->City; ?>
                        <br /> <?= $customer->PostCode; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>


<script type="text/javascript">
    function loadNotes ()
    {
        if ($('#add-note-form').css('display') == 'none')
            $('#add-note-form').slideDown();
        else
            $('#add-note-form').slideUp();

    }

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