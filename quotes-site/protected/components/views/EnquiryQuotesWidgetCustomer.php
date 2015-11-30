<?php
/* @var $this LeftMenuWidget */
/* @var $model Link */
/* @var $form CActiveForm */

$enquiryId = $enquiry->Id;
?>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Ref #</th>
                <th>Company</th>
                <th>Title</th>
                <th>Price</th>
                <th colspan="2">&nbsp;</th>
            </tr>
        </thead>
    <?php foreach ($quotes as $quote): ?>
        <tr class="<?= ($quote['Active'] == 'No'? 'danger': '') ?> <?= ($quote['Selected'] == 'Yes'? 'success': '') ?>">
            <td>
                DDQ<?= $quote['Id']; ?>
            </td>
            <td><?= $quote['CompanyName'];?></td>
            <td><?= $quote['Title'];?></td>
            <td>NZD <?= number_format($quote['Price'] + $quote['Tax'], 2); ?> </td>
            <td>
                <?php
                    $files = array();
                    if (!empty($quote['Files']))
                    {
                        $enquiry = DBBusinessQuote::model()->findByPk($quote['Id']);
                        $files = $enquiry->loadFiles();
                        ?>
                        <a href="#" onclick="javascript: showFiles(<?= $quote['Id'] ?>); return false;">
                            <img src="/images/link-icon.png" alt="view files" title="view files" />
                        </a>
                        <?php
                    }
                ?>
            </td>
            <td>
                <? if ($quote['Selected'] != 'Yes') : ?>
                    <a class="btn btn-warning" onclick="javascript: hireCompany(<?= $quote['Id'] ?>, <?= $enquiryId ?>, '<?= $quote['CompanyName'] ?>'); return false;" name="confirm-enquiry" value="<?= $quote['Id']; ?>">
                        HIRE
                    </a>
                <? else : ?>
                    <img style="width: 20px;" src="/images/logo-tick.png">
                <? endif; ?>
            </td>
        </tr>
        <?php if (!empty($files)) : ?>
            <tr class="file-quote-<?= $quote['Id']; ?>" style="display: none;">
                <td colspan="7" style="background-color: #EDEDED; line-height: 16px; padding-top: 16px;">
                    <ul class="list-unstyled">
                        <?php foreach ($files as $file): ?>
                            <li>
                                <a href="/customer/quote/<?= $file['Quote'] ?>/file/<?= $file['Id'] ?>" target="_blank">
                                    <?= $file['FileName'] ?>
                                </a>
                                (<?= date('d/m/Y H:i', strtotime($file['Created'])) ?>)
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
    <tr>
        <td colspan="6">&nbsp;</td>
    </tr>
    </table>
</div>

<script type="text/javascript">
    function hireCompany(quoteId, enquiryId, companyName)
    {
        if (confirm("Are you sure you want to hire the company " + companyName + "?"))
        {
            window.location.href = "/customer/enquiry/view/" + enquiryId + "/confirm/" + quoteId;
        }
    }
</script>
