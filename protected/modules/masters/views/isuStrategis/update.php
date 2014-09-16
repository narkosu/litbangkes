<?php
/* @var $this IsuStrategisController */
/* @var $model IsuStrategis */

$this->breadcrumbs=array(
	'Isu Strategises'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List IsuStrategis', 'url'=>array('index')),
	array('label'=>'Create IsuStrategis', 'url'=>array('create')),
	array('label'=>'View IsuStrategis', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage IsuStrategis', 'url'=>array('admin')),
);
?>

<h1>Update IsuStrategis <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>