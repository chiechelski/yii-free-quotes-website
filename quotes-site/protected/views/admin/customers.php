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
        <?php echo $this->renderPartial('_searchform_customers', array(
            'model' => $searchform));
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <a href="/admin/customer/add" class="btn btn-default"> Add Customer </a>
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>User name</th>
                    <th>Email</th>
                    <th>Added</th>
                    <th>Options</th>
                </tr>
            </thead>
            <?php foreach($models as $model): ?>
                <tr>
                    <td><?=$model->Id?></td>
                    <td><?=$model->FirstName?></td>
                    <td><?=$model->LastName?></td>
                    <td><?=$model->Username?></td>
                    <td><?=$model->Email?></td>
                    <td><?= date('d/m/Y H:i', strtotime($model->Created)) ?></td>
                    <td><a href="/admin/customer/<?=$model->Id?>" />Edit</td>
                </tr>
            <?php endforeach; ?>
        </table>

        <?php $this->widget('CLinkPager', array(
            'pages' => $pages,
        )) ?>
    </div>
</div>
