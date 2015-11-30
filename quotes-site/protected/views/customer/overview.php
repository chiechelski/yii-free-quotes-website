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

<?php
/*
 * Hide for now
<div class="row">
    <div class="col-md-12">
        <a href="/admin/enquiry/add" class="btn btn-default"> Add Enquiry </a>
    </div>
</div>
*/
?>

<h1>Enquiry list</h1>

<div class="row">
    &nbsp;
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>Ref #</th>
                    <th>Title</th>
                    <th>Priority</th>
                    <th>Active</th>
                    <th>Added</th>
                    <th>Options</th>
                </tr>
            </thead>
            <?php foreach($models as $model): ?>
                <tr class="<?= ($model->Active == 'No'? 'disabled': '') ?>">
                    <td>
                        <a href="/customer/enquiry/view/<?=$model->Id?>">
                            <?=$model->getRefNum()?>
                        </a>
                    </td>
                    <td><?=$model->Title?></td>
                    <td><?=$model->Priority?></td>
                    <td><?=$model->Active?></td>
                    <td><?= date('d/m/Y H:i', strtotime($model->Created)) ?></td>
                    <td>
                        <a href="/customer/enquiry/view/<?=$model->Id?>" />View</a>
                        <?php /* | <a href="/customer/enquiry/<?=$model->Id?>" />Edit</a>*/ ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($models)): ?>
                <tr class="">
                    <td colspan="6" style="text-align: center;">
                        - no enquiry to show -
                    </td>
                </tr>
            <?php endif; ?>
        </table>

        <?php $this->widget('CLinkPager', array(
            'pages' => $pages,
        )) ?>
    </div>
</div>
