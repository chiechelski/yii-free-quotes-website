<?php
/* @var $this LinkController */
/* @var $model Link */
/* @var $form CActiveForm */
?>

<div class="form chartDivs" id="country-chart" style="width: 900px; height: 400px; display: none;">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'link-form',
)); 

?>	
    <script type="text/javascript">
        google.load('visualization', '1', {'packages': ['geochart']});   
        function drawRegionsMap() 
        {          
          var data = new google.visualization.DataTable(); 

          data.addColumn('string', 'Country');
          data.addColumn('number', 'NbrVisits');
          data.addColumn('number', 'NbrUniqueVisits');

          <?php         
            if (isset($graphData['rows']) && !empty($graphData['rows']))
                foreach ($graphData['rows'] as $col)
                {
                    echo "data.addRow(['" . $col['Country'] . "', " . $col['NbrVisits'] . ", " . $col['NbrUniqueVisits'] . "]);";                
                }
          ?>

          var options = {
            title: 'Links Countries Performance',
            'animation.easing': 'inAndOut',
            colorAxis: {colors: ['#e2f2ff', '#00ADF1']}
          };

          var chart = new google.visualization.GeoChart(document.getElementById('countries_div'));
          chart.draw(data, options);
      }
      //google.setOnLoadCallback(drawRegionsMap);
    </script>
    <div id="countries_div" style="width: 900px; height: 400px;"></div>
    

<?php $this->endWidget(); ?>

</div><!-- form -->