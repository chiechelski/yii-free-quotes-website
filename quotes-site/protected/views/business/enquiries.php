<?php
/* @var $this AdminController */

unset($this->breadcrumbs);
?>

<div class="row">
    <div class="col-md-12">
        <?php
            $this->widget('BusinessMenuWidget');
        ?>
    </div>
</div>

<!--div class="row">
    <div class="col-md-12">
        <a href="/admin/enquiry/add" class="btn btn-default"> Add Enquiry </a>
    </div>
</div-->

<div class="row">
    &nbsp;
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>Ref #</th>
                    <th>Customer</th>
                    <th>Title</th>
                    <th>Priority</th>
                    <th>When</th>
                    <th>Active</th>
                    <th>Added</th>
                    <th>Options</th>
                </tr>
            </thead>
            <?php foreach($models as $model): ?>
                <tr class="<?= ($model->Active == 'No'? 'disabled': '') ?>">
                    <td>
                        <a href="/business/customer/enquiry/<?=$model->Id?>">
                            <?=$model->getRefNum()?>
                        </a>
                    </td>
                    <td><?=(!empty($model->User)? @$customers[$model->User]:'')?></td>
                    <td><?=$model->Title?> <?= (!empty($categories[$model->Id])? '(CM)':'') ?> </td>
                    <td><?=$model->Priority?></td>
                    <td><?=$model->When?></td>
                    <td><?=$model->Active?></td>
                    <td>
                        <?
                            $date = new DateTime($model->Created, new DateTimeZone('GMT'));
                            $date->setTimezone(new DateTimeZone('Pacific/Auckland'));
                            echo $date->format('d/m/Y H:i');
                        ?>
                    </td>
                    <td>
                        <a href="/business/customer/enquiry/<?=$model->Id?>" />View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <?php $this->widget('CLinkPager', array(
            'pages' => $pages,
        )) ?>
    </div>
</div>
