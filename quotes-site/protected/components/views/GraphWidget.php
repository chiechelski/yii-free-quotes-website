<?php
/* @var $this LinkController */
/* @var $model Link */
/* @var $form CActiveForm */
?>

<div class="form chartDivs" id="line-chart col-md-12" style="height: 400px;">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'link-form',
));
?>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      function drawChart()
      {
        var data = new google.visualization.DataTable();
        <?php
            if (isset($graphData['cols']) && !empty($graphData['cols']))
                foreach ($graphData['cols'] as $col)
                {
                    echo "data.addColumn('" . $col['type'] . "', '" . $col['label'] . "');";
                }

            if (isset($graphData['rows']) && !empty($graphData['rows']))
                foreach ($graphData['rows'] as $col)
                {
                    echo "data.addRow(['" . $col['Day'] . "', " . $col['NbrCreated'] . "]);";
                }
        ?>
        var options = {
          title: ' New <?= $this->type ?>  - Monthly Performance',
          'animation.easing': 'inAndOut',
          vAxis: {minValue:0 /*, format:'#'*/},
          colorAxis: {colors: ['#F15A23', '#00ADF1']}
        };

        var chart = new google.visualization.<?=(count($graphData['rows']) > 1?'LineChart':'ColumnChart')?>(document.getElementById('chart_div_<?= $this->type ?>'));
        chart.draw(data, options);
      }
      google.setOnLoadCallback(drawChart);
    </script>
    <div id="chart_div_<?= $this->type ?>" style="width: 100%; height: 300px;"></div>


<?php $this->endWidget(); ?>

</div><!-- form -->