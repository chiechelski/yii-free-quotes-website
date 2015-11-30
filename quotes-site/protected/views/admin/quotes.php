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
        <a href="/admin/enquiry/add" class="btn btn-default"> Add Enquiry </a>
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
                <tr>
                    <td><?=$model->Id?></td>
                    <td><?=$model->CompanyName?></td>
                    <td><?=$model->FirstName?></td>
                    <td><?=$model->LastName?></td>
                    <td><?=$model->Email?></td>
                    <td><?= date('d/m/Y H:i', strtotime($model->Created)) ?></td>
                    <td><a href="/admin/supplier/<?=$model->Id?>" />Edit</td>
                </tr>
            <?php endforeach; ?>
        </table>

        <?php $this->widget('CLinkPager', array(
            'pages' => $pages,
        )) ?>
    </div>
</div>
