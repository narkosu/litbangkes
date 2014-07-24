<?php
/* @var $this ProgrespenelitianController */
/* @var $model ProgresPenelitian */

$this->breadcrumbs=array(
	'Progres Penelitians'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProgresPenelitian', 'url'=>array('index')),
	array('label'=>'Create ProgresPenelitian', 'url'=>array('create')),
	array('label'=>'View ProgresPenelitian', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProgresPenelitian', 'url'=>array('admin')),
);
?>

<h1>Update ProgresPenelitian <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>