<?php
/* @var $this IsuStrategisController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Isu Strategises',
);

$this->menu=array(
	array('label'=>'Create IsuStrategis', 'url'=>array('create')),
	array('label'=>'Manage IsuStrategis', 'url'=>array('admin')),
);
?>

<h1>Isu Strategises</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
