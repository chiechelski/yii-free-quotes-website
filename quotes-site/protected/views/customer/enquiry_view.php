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
        <a href="/customer/overview" class="btn btn-default"> Back to overview list </a>
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
                    <b>Active:</b>
                    <?php echo $model->Active; ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 linked-quotes">
            <div class="row">
                <div class="col-md-12">
                    <h1>Linked Quotes</h1>
                </div>

                <?php if(Yii::app()->user->hasFlash('confirmedQuote')): ?>
                    <div class="alert alert-success">
                        <?php echo Yii::app()->user->getFlash('confirmedQuote'); ?>
                    </div>
                <?php endif; ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php
                            $this->widget('EnquiryQuotesWidget', array('enquiry' => $model, 'type' => 'Customer'));
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