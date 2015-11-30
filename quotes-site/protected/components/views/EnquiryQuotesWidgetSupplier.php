<?php
/* @var $this LeftMenuWidget */
/* @var $model Link */
/* @var $form CActiveForm */
?>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Ref #</th>
                <th>Company</th>
                <th>Title</th>
                <th>Price</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
    <?php foreach ($quotes as $quote): ?>
        <tr class="<?= ($quote['Active'] == 'No'? 'danger': '') ?> <?= ($quote['Selected'] == 'Yes'? 'success': '') ?>">
            <td>
                <a href="/business/quote/<?= $quote['Id']; ?>/enquiry/<?= $enquiry->Id; ?>">
                    DDQ<?= $quote['Id']; ?>
                </a>
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
        </tr>
        <?php if (!empty($files)) : ?>
            <tr class="file-quote-<?= $quote['Id']; ?>" style="display: none;">
                <td colspan="6" style="background-color: #EDEDED; line-height: 16px; padding-top: 16px;">
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
