<?php
/* @var $this LeftMenuWidget */
/* @var $model Link */
/* @var $form CActiveForm */

?>

<?php if (!is_null($enquiry)): ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Ref #</th>
                    <th>Company</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Tax</th>
                    <th colspan="2">&nbsp;</th>
                </tr>
            </thead>
        <?php foreach ($quotes as $quote): ?>
            <tr class="<?= ($quote['Active'] == 'No'? 'danger': '') ?> <?= ($quote['Selected'] == 'Yes'? 'success': '') ?>">
                <td>
                    <a href="/admin/quote/<?= $quote['Id']; ?>/enquiry/<?= $enquiry->Id; ?>">
                        DDQ<?= $quote['Id']; ?>
                    </a>
                </td>
                <td><?= $quote['CompanyName'];?></td>
                <td><?= $quote['Title'];?></td>
                <td><?= $quote['Price'];?></td>
                <td><?= $quote['Tax'];?></td>
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
                    <? if ($quote['Selected'] == 'Yes') : ?>
                        <img style="width: 20px;" src="/images/logo-tick.png">
                    <? elseif ($quote['Active'] == 'Yes') : ?>
                        <a class="btn btn-warning" onclick="javascript: hireCompany(<?= $quote['Id'] ?>, <?= $enquiry->Id ?>, '<?= $quote['CompanyName'] ?>'); return false;" name="confirm-enquiry" value="<?= $quote['Id']; ?>">
                            HIRE
                        </a>
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
        </table>
    </div>
<?php else: ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Enquiry #</th>
                    <th>Quote #</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Tax</th>
                </tr>
            </thead>
        <?php foreach ($quotes as $quote): ?>
            <tr class="<?= ($quote['Active'] == 'No'? 'danger': '') ?> <?= ($quote['Selected'] == 'Yes'? 'success': '') ?>">
                <td>
                    <a href="/admin/enquiry/<?= $quote['Enquiry']; ?>">
                        DDE<?= $quote['Enquiry']; ?>
                    </a>
                </td>
                <td>
                    <a href="/admin/quote/<?= $quote['Id']; ?>/enquiry/<?= $quote['Enquiry']; ?>">
                        DDQ<?= $quote['Id']; ?>
                    </a>
                </td>
                <td><?= $quote['Title'];?></td>
                <td><?= $quote['Price'];?></td>
                <td><?= $quote['Tax'];?></td>
            </tr>
        <?php endforeach; ?>
        </table>
    </div>
<?php endif; ?>

<script type="text/javascript">
    function hireCompany(quoteId, enquiryId, companyName)
    {
        if (confirm("Are you sure you want to hire the company " + companyName + "?"))
        {
            window.location.href = "/admin/enquiry/view/" + enquiryId + "/confirm/" + quoteId;
        }
    }
</script>