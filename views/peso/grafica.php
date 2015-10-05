<?php
use miloschuman\highcharts\Highcharts;
error_log('DEBUG: en grafica.php');
echo Highcharts::widget( array(
   'options' => array(
      'exporting' => array('enabled' => true),
      'title' => array('text' => 'Mes'),
      'theme' => 'grid',
      'rangeSelector' => array('selected' => 1),
      'xAxis' => array(
         'categories' => $fecha
      ),
      'yAxis' => array(
         'title' => array('text' => 'Peso')
      ),
      'series' => array(
         array('name' => 'Total', 'data' => $peso),
      )
   )
));
?>