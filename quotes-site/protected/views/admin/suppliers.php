<?php
/* @var $this AdminController */

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
    <div class="col-md-12">
        <?php echo $this->renderPartial('_searchform_suppliers', array(
            'model' => $searchform,
            'subCategories' => $subCategories));
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <a href="/admin/supplier/add" class="btn btn-default"> Add Supplier </a>
    </div>
</div>

<div class="row">
    &nbsp;
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Company Name</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Added</th>
                    <th>Options</th>
                </tr>
            </thead>
            <?php foreach($models as $model): ?>
                <tr class="<?= ($model->Active == 'No'? 'disabled': '') ?>">
                    <td><?=$model->Id?></td>
                    <td><?=$model->CompanyName?></td>
                    <td><?=$model->FirstName?></td>
                    <td><?=$model->LastName?></td>
                    <td><?=$model->Email?></td>
                    <td><?= date('d/m/Y H:i', strtotime($model->Created)) ?></td>
                    <td>
                        <a href="/admin/supplier/view/<?=$model->Id?>" />View</a>
                        |
                        <a href="/admin/supplier/<?=$model->Id?>" />Edit</a>
                        |
                        <a href="/admin/supplier/directory/<?=$model->Id?>" />Directory</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <?php $this->widget('CLinkPager', array(
            'pages' => $pages,
        )) ?>
    </div>
</div>
