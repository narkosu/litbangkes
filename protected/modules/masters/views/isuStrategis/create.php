<?php
/* @var $this IsuStrategisController */
/* @var $model IsuStrategis */

$this->breadcrumbs=array(
	'Isu Strategises'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List IsuStrategis', 'url'=>array('index')),
	array('label'=>'Manage IsuStrategis', 'url'=>array('admin')),
);
?>

<h1>Create IsuStrategis</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>