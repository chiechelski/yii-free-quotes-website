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
    <div class="col-md-6">
        <?php $this->widget('GraphWidget', array('type' => 'suppliers')); ?>
    </div>
    <div class="col-md-6">
        <?php $this->widget('GraphWidget', array('type' => 'enquiries')); ?>
    </div>
</div>

<script type="text/javascript">
    function displayGraph(type)
    {
        $('.chartDivs').css('display', 'none');
        $('#' + type + '-chart').css('display', '');

        drawChart();
    }
</script>
